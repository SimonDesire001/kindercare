#include <stdio.h>
#include <stdlib.h>
#include "register/register.c"
#include "login/login.c"
int main()
{



int ch;
system("color 0b");

printf("press '1' for register\n  press '2' for login\n\n");
scanf("%d",&ch);

if(ch==1)
  {
    system("cls");
    registe();
  }
else if(ch==2)
  {
    system("cls");
    login();
  }
  return 0;
}