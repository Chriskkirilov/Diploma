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
  humidityValue = analogRead(humidityPin); 
  lightInput = analogRead(lightPin); 
 
  temp = (double)tempInput / 1024;
  temp = temp * 5;
  temp = temp - 0.5;
  temp = temp * 100;

  humidityValue = humidityValue - 1023;
  humidityValue = abs(humidityValue);

  lightInput = analogRead(lightPin);
  //Serial.print("Current Light Intensity: ");
  //Serial.println(lightInput);
 
  //Serial.print("Current Temperature: ");
  //Serial.println(temp);

  //Serial.print("Current Humidity : ");
  Serial.println(humidityValue);

  if(humidityValue < 30) {
     digitalWrite(motorPin, HIGH); 
  }
  else {
     digitalWrite(motorPin, LOW);
  }
}
