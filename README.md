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

### Execution

This solution was developed on a PHP 7.1 + nginx environment. Just clone this repository to any directory that the webserver can access.

Run on browser http://[your-host]/[path-to-clone]/index.php and the browser will show [this](https://www.diigo.com/file/image/baqqeobazeeobbeqrazddppeerq/Hell%27s+Triangle+challenge.jpg).

Fill in the values as you wish and submit it. The server will process the request and show the answer, or an error if the given triangle is not valid.

### Testing

To execute the tests, it is necessary to install the PHPUnit via Composer. In the server, navigate to the root folder of this project and run the command:

```
php composer.phar install
```

This will download all the dependencies to execute the tests. Now it's time to execute them. Run the folowing command:

```
./vendor/bin/phpunit
```