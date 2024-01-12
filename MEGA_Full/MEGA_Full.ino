#include <ArduinoJson.h> // For JSON
#include <dht.h> // For DH11 Sensor
#include <Filters.h>  // For Current Sensor
#include <Servo.h> // For servo motors

//#include <Wire.h> // For Gyro

dht DHT; // For DH11 Sensor

#define DHT11_PIN 10 // For DH11 Sensor

////// For Gyro ////////////

//const int MPU_addr=0x68;         //I2C MPU6050 Address
//int16_t axis_X,axis_Y,axis_Z;    
//int minVal=265;
//int maxVal=402;
//
//double x;
//double y;
//double z;
//
//int pos = 0;

/// For Motors /////////////////

Servo servo_updown;  // create servo object to control a servo
Servo servo_rightleft;  // create servo object to control a servo (Base Servo Motor)
Servo servopanel1;  // create servo object to control a servo
Servo servopanel2;  // create servo object to control a servo

const int ldrPin1 = A1;
const int ldrPin2 = A2;
const int ldrPin3 = A5;
const int ldrPin4 = A4;

int topl = 0;
int topr = 0; 
int botl = 0;
int botr = 0;

int openchecksl = 0; // Check light for open solar

int threshold_value=10;           //measurement sensitivity

////// For Current Sesnor ///////

#define ACS_Pin A0 // Current Value Read Pin

float ACS_Value;                              //Here we keep the raw data valuess
float testFrequency = 50;                    // test signal frequency (Hz)
float windowLength = 40.0/testFrequency;     // how long to average the signal, for statistist

float intercept = 0; // to be adjusted based on calibration testing
float slope = 0.0752; // to be adjusted based on calibration testing

float Amps_TRMS; // estimated actual current in amps

unsigned long printPeriod = 1000; // in milliseconds
unsigned long previousMillis = 0;

////////////////////////////////

unsigned long lastTime = 0;
unsigned long timerDelay = 10000; // 10 seconds

String serval; // Serial Value Store
String urldata; // Send URL paramerters
String locval = "Colombo";
String solval = "1";
int lp = 0;
int dtav = 0;

float idv;
float stv;

//////////////////////////////////////////////

void automaticsolartracker(){
  //capturing analog values of each LDR
  topr= analogRead(ldrPin1);         //capturing analog value of top right LDR
  topl= analogRead(ldrPin2);         //capturing analog value of top left LDR
  botr= analogRead(ldrPin3);         //capturing analog value of bot right LDR
  botl= analogRead(ldrPin4);         //capturing analog value of bot left LDR

  // calculating average
  int avgtop = (topr + topl) / 2;     //average of top LDRs
  int avgbot = (botr + botl) / 2;     //average of bottom LDRs
  int avgleft = (topl + botl) / 2;    //average of left LDRs
  int avgright = (topr + botr) / 2;   //average of right LDRs
  
  //Get the different 
  int diffelev = avgtop - avgbot;      //Get the different average betwen LDRs top and LDRs bot
  int diffazi = avgright - avgleft;    //Get the different average betwen LDRs right and LDRs left

  //up-down movement of solar tracker

  if (abs(diffelev) >= threshold_value){    //Change position only if light difference is bigger then thethreshold_value
    if (diffelev > 0) {
      if (servo_updown.read() < 170) {
        servo_updown.write((servo_updown.read() - 2));
      }
    }
    if (diffelev <  0) {
      if (servo_updown.read() > 10) {
        servo_updown.write((servo_updown.read() + 2));
       }
    }
  }

  //left-right movement of solar tracker
     
  if (abs(diffazi) >= threshold_value){        //Change position only if light difference is bigger then the threshold_value
    if (diffazi > 0 && servo_updown.read() < 90) {
      if (servo_rightleft.read() < 180) {
        servo_rightleft.write((servo_rightleft.read() + 2));
      }
    }
    if (diffazi > 0 && servo_updown.read() > 90) {
      if (servo_rightleft.read() > 0) {
        servo_rightleft.write((servo_rightleft.read() - 2));
      }
    }
    if (diffazi <  0 && servo_updown.read() < 90) {
      if (servo_rightleft.read() > 0) {
        servo_rightleft.write((servo_rightleft.read() - 2));
      }
    }
    if (diffazi <  0 && servo_updown.read() > 90) {
      if (servo_rightleft.read() < 180) {
        servo_rightleft.write((servo_rightleft.read() + 2));
      }
    }
  }
  
}

void setup() {
  Serial1.begin(9600);
  Serial.begin(9600);
  pinMode(ACS_Pin,INPUT); // Current Sensor

  ////// For Gyro ///////

//  Wire.begin();                        //Begins I2C communication
//  Wire.beginTransmission(MPU_addr);    //Begins Transmission with MPU6050
//  Wire.write(0x6B);                    //Puts MPU6050 in Sleep Mode
//  Wire.write(0);                       //Puts MPU6050 in power mode 
//  Wire.endTransmission(true);          //Ends Trasmission

  /////////////////

  pinMode(ldrPin1, INPUT); // For LDR
  pinMode(ldrPin2, INPUT); // For LDR
  pinMode(ldrPin3, INPUT); // For LDR
  pinMode(ldrPin4, INPUT); // For LDR

  servo_rightleft.attach(9,600,2300);  // (pin, min, max) Base Servo Motor
  servo_updown.attach(8,600,2300);  // (pin, min, max) Upper Servo Motor
  servopanel1.attach(7,600,2300);  // (pin, min, max)
  servopanel2.attach(6,600,2300);  // (pin, min, max)
  
  servo_rightleft.write(90);
  servo_updown.write(90);
  servopanel1.write(0);
  servopanel2.write(0);
  delay(10000);
  //Serial.println("Solar start working...");
}

void loop() {

  /// For Gyro //////////

//  Wire.beginTransmission(MPU_addr); //Begins I2C transmission 
//  Wire.write(0x3B);                 //Start with register 0x3B (ACCEL_XOUT_H)             
//  Wire.endTransmission(false);
//  Wire.requestFrom(MPU_addr,14,true); //Request 14 Registers from MPU6050
//  
//  axis_X=Wire.read()<<8|Wire.read(); //Obtain 0x3B (ACCEL_XOUT_H) & 0x3C (ACCEL_XOUT_L) 
//  axis_Y=Wire.read()<<8|Wire.read(); //0x3B (ACCEL_YOUT_H) & 0x3C (ACCEL_YOUT_L)
//  axis_Z=Wire.read()<<8|Wire.read(); //0x3B (ACCEL_ZOUT_H) & 0x3C (ACCEL_ZOUT_L)
//
//  int xAng = map(axis_X,minVal,maxVal,-90,90); 
//  int yAng = map(axis_Y,minVal,maxVal,-90,90);
//  int zAng = map(axis_Z,minVal,maxVal,-90,90);
//  
//  x = RAD_TO_DEG * (atan2(-yAng, -zAng)+PI);    
//  y = RAD_TO_DEG * (atan2(-xAng, -zAng) + PI);
//  z = RAD_TO_DEG * (atan2(-yAng, -xAng) + PI);

  /// Open Solar Panels ///////////////////////

  openchecksl = analogRead(ldrPin1);

  if(openchecksl>500){
    servopanel1.write(180);
    servopanel2.write(180);
  }else{
    servopanel1.write(0);
    servopanel2.write(0);
  }

  ////////////////////////////////////////////

  RunningStatistics inputStats;                 // create statistics to look at the raw test signal
  inputStats.setWindowSecs( windowLength );     //Set the window length

  ACS_Value = analogRead(ACS_Pin);  // read the analog in value:
  inputStats.input(ACS_Value);  // log to Stats function

  serval = "";

  lp = 0;

  while (Serial1.available()>0) {
     serval = Serial1.readStringUntil('\n');
     lp = 1; 
     dtav = 0;    
  }

  if(lp == 1){
       //Serial.println(serval);

        /////// JSON Code ///////////////////

        StaticJsonDocument<200> doc; // JSON

        DeserializationError error = deserializeJson(doc, serval);

        if (error) {
          //Serial.print(F("deserializeJson() failed: "));
          //Serial.println(error.f_str());
          //return;
        }

        idv = doc["azi"];
        stv = doc["alt"];

        Serial.print("azimuth:");
        Serial.print(idv);
        Serial.print("\t altitude:");
        Serial.println(stv);

        ////////////////////////////////////

        /// Motor Control & LDR Code ////////////

        if(stv > 0){ 
          if(idv < 180){
            if(stv < 170){ // This set becouse of frame hit to base of solar panel
              servo_updown.write(stv);
            }else{
              servo_updown.write(10);           
            }
          }else{
            if(stv > 10){ // This set becouse of frame hit to base of solar panel
              servo_updown.write(180 - stv);
            }else{
              servo_updown.write(170);            
            }
          } 
                 
        }

        delay(100);

        if(idv > 0){
          if(idv < 180){
            servo_rightleft.write(180-idv);
          }else if(idv > 180){
            servo_rightleft.write(360-idv);
          }          
        }

        delay(100);

        ////////////////////////////////////

  }

  //if(dtav == 0 || idv ==0){

    if ((millis() - lastTime) > timerDelay) {

      /// Current Sensor /////////////////////
        
      Amps_TRMS = intercept + slope * inputStats.sigma();

      String ampv = String(Amps_TRMS);

      /// Tep and Hum ////////////////////////

      int chk = DHT.read11(DHT11_PIN);

      float t = DHT.temperature; // Gets the values of the temperature
      float h = DHT.humidity; // Gets the values of the humidity

      String tp = String(t);
      String hm = String(h);
    
      ////////////////////////////////////////

      /// ?lc=SLITT&sno=1&vl=0&cr=20&tm=60&hm=130
   
      urldata = "?lc="+locval+"&sno="+solval+"&vl=0&cr="+ampv+"&tm="+tp+"&hm="+hm;
      Serial1.println(urldata);
      Serial.println(urldata);

      lastTime = millis(); 
    }


    //dtav = 1;
  //}

  //automaticsolartracker(); // Uncomment when need auto adjust with LDRs
  delay(100);

}
