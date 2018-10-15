package krakathon;

import java.util.Scanner;

public class Palindrome {
	public static boolean isPalindrome(int nr) {
	    int rev = 0;                    // the reversed number
	    int x = nr;                     // store the default value (it will be changed)
	    while (x > 0) {
	        rev = 10 * rev + x % 10;
	        x /= 10;
	    }
	    return nr == rev;               // returns true if the number is palindrome
	}
	public static void main(String[] args) {
		Scanner scan = new Scanner(System.in);
		System.out.print("First num:");
		int indexi =scan.nextInt();
		System.out.print("Second num:");
		int indexj =scan.nextInt();
		 int max = -1;
		 int high, low;
		
		 high = indexi>=indexj? indexi: indexj;
		 low = indexj>indexi? indexi: indexj;
		 int lasti=0; int lastj=0;
		    for ( int i = low ; i >= 10 ; i--) {
		        if ( max >= i*999 ) { 
		            break;
		        }
		        for (int j = high ; j >= i ; j-- ) {             
		            int p = i * j;
		            if ( max < p && isPalindrome(p) ) {
		                max = p;
		                lasti=i;
		                lastj=j;
		            }
		        }
		    }       
		    System.out.println(max > -1? max : "No palindrome found");
		    System.out.println(lasti +"- " + lastj);
	}
}
