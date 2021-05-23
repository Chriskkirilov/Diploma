#include <FastLED.h>

const int LED_PIN = 7;
const int NUM_LEDS = 10;
CRGB leds[NUM_LEDS];

const int tempPin = A0;
int tempInput;
double temp;

const int lightPin = A1;
int lightInput;

const int humidityPin = A2;
int humidityValue;

const int motorPin = 9;

void setup() {
  Serial.begin(9600);
  pinMode(motorPin, OUTPUT);
  FastLED.addLeds<WS2812B, LED_PIN, GRB>(leds, NUM_LEDS);
}
void loop() {
  tempInput = analogRead(tempPin);
  float humidityValue = analogRead(humidityPin);
  float lightInput = analogRead(lightPin);

  //converting that reading to voltage
  double voltage = tempInput * 5.0;
  voltage /= 1024;

  float temperatureC = (voltage - 0.5) * 100 ;

  humidityValue = humidityValue - 1023;
  humidityValue = abs(humidityValue);
  humidityValue = map(humidityValue, 0, 1023, 0, 100);

  lightInput = analogRead(lightPin);
  lightInput = map(lightInput, 0, 1023, 0, 100);

  if (humidityValue < humidityPeak) {
    digitalWrite(motorPin, HIGH);
  }
  else {
    digitalWrite(motorPin, LOW);
  }

  if (lightInput < lightPeak) {
    for (int i = 0; i < 10; i++) {
      leds[i] = CRGB(255, 249, 253);
      FastLED.show();
    }
  }
  else {
    for (int i = 0; i < 10; i++) {
      leds[i] = CRGB::Black;
      FastLED.show();
    }
  }

  Serial.print(temperatureC);
  Serial.print(" ");
  Serial.print(lightInput);
  Serial.print(" ");
  Serial.print(humidityValue);
  delay(5000);


}
