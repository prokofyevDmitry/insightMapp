/*
 * tringle.c
 *
 *  Created on: Sep 16, 2014
 *      Author: root
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(int argc, char** argv)
{
	char string[100];
	int i,j;
	if(argc== 2)
	{

		for(i=0; i<=atoi(argv[1]); i++)
		{
			string[i] = '*';
			for(j=0; j<i;j++)
								{
									printf("%c",string[j]);
								}
								printf("\n");
				}

		}
	else
printf("mauvaise entrée");




}
