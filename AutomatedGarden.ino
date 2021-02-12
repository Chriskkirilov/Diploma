const int tempPin = A0;
int tempInput;
double temp;

const int lightPin = A1;
int lightInput;

const int humidityPin = A2; 
int humidityValue; 

const int motorPin = 8;
 
void setup() {
  Serial.begin(9600);
  pinMode(motorPin, OUTPUT);
}
void loop() {
  tempInput = analogRead(tempPin);
  float humidityValue = analogRead(humidityPin); 
  float lightInput = analogRead(lightPin); 
  
 //converting that reading to voltage
 double voltage = tempInput * 5.0;
 voltage /= 1024; 

 float temperatureC = (voltage - 0.5) * 100 ;
 /*
 converting from 10 mv per degree with 500 mV offset
 to degrees ((voltage - 500mV) times 100)]
 */

  humidityValue = humidityValue - 1023;
  humidityValue = abs(humidityValue);

  lightInput = analogRead(lightPin);

  if(humidityValue < 20) {
     digitalWrite(motorPin, HIGH); 
  }
  else {
     digitalWrite(motorPin, LOW);
  }

  Serial.print(temperatureC);
  Serial.print(" ");
  Serial.print(lightInput);
  Serial.print(" ");
  Serial.print(humidityValue);
  
  delay(10000);
  
}
