#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

#define RXp2 16 // For UART
#define TXp2 17 // For UART

const char* ssid = "LAPTOP-DISHEN"; // WIFI Name
const char* password = "12345678"; // WIFI Password

String serverName = "http://solarpanelcontrolslitt.000webhostapp.com/data/data.php";

String serval; // Serial value store 

int httpResponseCode = 0;

String payload; // Data from website / return value from web site

int callc = 0; // Number of errors 

void setup() {
  Serial.begin(9600); 
  Serial2.begin(9600, SERIAL_8N1, RXp2, TXp2);

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Get data from web page.");
}

void loop() {
  //Send an HTTP POST request every above defined seconds
  if (Serial2.available()>0) {
    while (Serial2.available()>0) {
      serval = Serial2.readStringUntil('\n');
    }
    serval.trim();
    
    //Serial.print("Serial Data:");
    //Serial.println(serval);
        
    if(WiFi.status()== WL_CONNECTED){
      Serial.println("\n");
      Serial.println("New");
      Serial.println("\n");
      
      String serverPath = serverName + serval;

      //String serverPath = "https://solarpanelcontrolslitt.000webhostapp.com/data/data.php?lc=SLITT&sno=1&vl=0&cr=20&tm=60&hm=130";

      int er = 1;

      Serial.print("Request:");
      Serial.println(serverPath);
      Serial.println("Sent");

      while(er){
        HTTPClient http;

        http.begin(serverPath.c_str());
        http.setTimeout(5000);
        
        httpResponseCode = http.GET();
        if(httpResponseCode == 200){
          payload = http.getString();
          if(payload.indexOf('<') == 0){
          }else{
            er = 0;
            callc = 0;
            Serial.println("Got and Suc.");
          }
        }else{
        }
        delay(1000);
        http.end();

        callc = callc + 1;

        if(callc > 10){
          ESP.restart();
          callc = 0;
        }
      }
      Serial.println("\n");      
      
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        Serial.println(payload);
        Serial2.println(payload);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    
  }
  delay(100);
}
