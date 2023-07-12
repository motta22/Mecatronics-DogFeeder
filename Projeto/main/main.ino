int servopin = 9; // select digital pin 9 for servomotor signal line
int servopin1 = 10; // select digital pin 9 for servomotor signal line
int servopin2 = 11;
int myangle;// initialize angle variable
int pulsewidth;// initialize width variable
int val;
const int stepPin = 3;
const int dirPin = 4; 
const int stepPin1 = 5;
const int dirPin1 = 6; 
const int motorpin;
int duration = 2500;
int flagFase1 = 0;
int flagFase2 = 0;
int aux=0;

void servopulse(int myangle) // define a servo pulse function
{
  for (int i = 0; i <= 50; i++) // giving the servo time to rotate to commanded position
  {
    pulsewidth = (myangle * 11) + 500; // convert angle to 500-1490 pulse width
    digitalWrite(servopin, HIGH); // set the level of servo pin as “high”
    digitalWrite(servopin1, HIGH); // set the level of servo pin as “high”
    digitalWrite(servopin2, HIGH);
    delayMicroseconds(pulsewidth);// delay microsecond of pulse width
    digitalWrite(servopin1, LOW); // set the level of servo pin as “low”
    digitalWrite(servopin2, LOW);
    digitalWrite(servopin, LOW); // set the level of servo pin as “low”
    delay(20 - pulsewidth / 1000);
  }
}

void MotorPulse(int duraction, int motorpin) // define a servo pulse function
{
  while(1){
  // Makes pules with custom delay, depending on the Potentiometer, from which the speed of the motor depends
  digitalWrite(motorpin, HIGH);
  delayMicroseconds(830);//830
  digitalWrite(motorpin, LOW);
  delayMicroseconds(830);
  aux=aux+1;
  if(aux>=duraction){
    break;
  }
  }
}

void setup() {
  // Sets the two pins as Outputs
  pinMode(stepPin,OUTPUT);
  pinMode(dirPin,OUTPUT);
  Serial.begin(9600);// connect to serial port, set baud rate at “9600”
  digitalWrite(dirPin,HIGH); //Enables the motor to move in a particular direction
  pinMode(servopin, OUTPUT); // set servo pin as “output”
  pinMode(servopin1, OUTPUT); // set servo pin as “output”
  pinMode(servopin2, OUTPUT); // set servo pin as “output”
  Serial.begin(9600);// connect to serial port, set baud rate at “9600”
  Serial.println("servo=o_seral_simple ready" ) ;
}

void loop() {
    val = Serial.read(); // read serial port value
  if (val >= '0' && val <= '9')
  {
    val = val - '0'; // convert characteristic quantity to numerical variable
    val = val * (90 / 9); // convert number to angle
    Serial.print("moving servo to ");
    Serial.print(val, DEC);
    Serial.println();
    servopulse(val);
  }
  if (flagFase1==0)
  {
    aux=0;
    MotorPulse(duration,stepPin);
    Serial.print("Sair fase 1");
    Serial.print("\n");
    flagFase1=1;
  }
  if (flagFase2==0)
  {
    aux=0;
    MotorPulse(duration,stepPin1);
    Serial.print("Sair fase 2");
    Serial.print("\n");
    flagFase2=1;
  }
}
