import sys

sys.path.append(r"C:\Users\USER\Anaconda3\Lib\site-packages")

import sympy
from sympy.core.symbol import Symbol
from sympy import *
from sympy.logic import simplify_logic
from sympy import S

x, y = symbols('x y')

c, d = symbols('c d')

a = 2*x
b = 2*x
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True


a = 2*(x+y)
b = 2*x+2*y
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True

a = x+y
b = c+d
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True


a = 2*(x+y)
b = 2*x+2*y
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True


a = x+y
b = c+d
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True


a = 2*(x+y)
b = 2*x+2*y

print(expand(a)) # [{x: 6/(y + 1)}]
print(expand(b)) # [{x: 6/(y + 1)}]
print(solve(a)) # [{x: 6/(y + 1)}]
print(solve(b)) # [{x: 6/(y + 1)}]
print(solve(a) == solve(b)) # True





a = ~ (x & y)

b = ~x | ~y



#print(solve(a)) 
#print(solve(b)) 
#print(solve(a) == solve(b)) # True


x, y, z, t = symbols('x y z t')

b = (~x & ~y & ~z) | ( ~x & ~y & z)

print(simplify_logic(b))

a = ~ (x & y)

b = ~x | ~y

print(simplify_logic(a)==simplify_logic(b))


