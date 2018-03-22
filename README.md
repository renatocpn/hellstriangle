# hellstriangle
My solution to 'Hells Triangle' problem

## Problem
Given a triangle of numbers, find the maximum total from top to bottom
Example:
```
   6
  3 5
 9 7 1
4 6 8 4
```
In this triangle the maximum total is: 6 + 5 + 7 + 8 = 26

## Solution
### Laws
#### Law 1

- row 0 - 1 element
- row 1 - 2 elements
- row 2 - 3 elements
- row 3 - 4 elements
- **row n - n+1 elements**

#### Law 2

Consider node(i,j) as a node from row i and position j

- Children of node(0,0) - node(1,0) and node(1,1)
- Children of node(1,0) - node(2,0) and node(2,1)
- Children of node(1,1) - node(2,1) and node(2,2)
- Children of node(2,0) - node(3,0) and node(3,1)
- Children of node(2,1) - node(3,1) and node(3,2)
- Children of node(2,2) - node(3,2) and node(3,3)
- **Children of node(i,j) - node(i+1,j) and node(i+1,j+1)**

#### Law 3

For this example, the value of all nodes are positive integer. Zero is a valid value too.
