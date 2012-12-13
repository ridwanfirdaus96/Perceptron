<?php
/**
 * JTet\Perceptron\Test
 * https://github.com/jtet/Perceptron
 *
 * Please see http://www.spdx.org/licenses/OSL-3.0#licenseText
 * for license information.
 */
namespace JTet\Perceptron\Tests;

/**
 * Common Linearly Seperable Functions which are known to be
 * learnable by a Perceptron
 */
class PerceptronTest extends \PHPUnit_Framework_TestCase
{
    public function testNAND()
    {
        $p = new \JTet\Perceptron\Perceptron(2, 0, .1);

        $i = 0;
        while($i < 1000)
        {
            $input = array(0, 0);
            $output = true;
            $p->train($input, $output);

            $input = array(0, 1);
            $output = true;
            $p->train($input, $output);

            $input = array(1,0);
            $output = true;
            $p->train($input, $output);

            $input = array(1,1);
            $output = false;
            $p->train($input, $output);

            $i++;
        }

        $this->assertFalse($p->test(array(1,1)));
        $this->assertTrue($p->test(array(0,1)));
        $this->assertTrue($p->test(array(1,0)));
        $this->assertTrue($p->test(array(0,0)));
    }

    public function testAND()
    {
        $p = new \JTet\Perceptron\Perceptron(2, 0, .1);

        $i = 0;
        while($i < 1000)
        {
            $input = array(0, 0);
            $output = false;
            $p->train($input, $output);

            $input = array(0, 1);
            $output = false;
            $p->train($input, $output);

            $input = array(1,0);
            $output = false;
            $p->train($input, $output);

            $input = array(1,1);
            $output = true;
            $p->train($input, $output);

            $i++;
        }

        $this->assertTrue($p->test(array(1,1)));
        $this->assertFalse($p->test(array(0,1)));
        $this->assertFalse($p->test(array(1,0)));
        $this->assertFalse($p->test(array(0,0)));
    }

    public function testOR()
    {
        $p = new \JTet\Perceptron\Perceptron(2, 0, .1);

        $i = 0;
        while($i < 1000)
        {
            $input = array(0, 0);
            $output = false;
            $p->train($input, $output);

            $input = array(0, 1);
            $output = true;
            $p->train($input, $output);

            $input = array(1,0);
            $output = true;
            $p->train($input, $output);

            $input = array(1,1);
            $output = true;
            $p->train($input, $output);

            $i++;
        }

        $this->assertTrue($p->test(array(1,1)));
        $this->assertTrue($p->test(array(0,1)));
        $this->assertTrue($p->test(array(1,0)));
        $this->assertFalse($p->test(array(0,0)));
    }

    public function testNOR()
    {
        $p = new \JTet\Perceptron\Perceptron(2, 0, .1);

        $i = 0;
        while($i < 1000)
        {
            $input = array(0, 0);
            $output = true;
            $p->train($input, $output);

            $input = array(0, 1);
            $output = false;
            $p->train($input, $output);

            $input = array(1,0);
            $output = false;
            $p->train($input, $output);

            $input = array(1,1);
            $output = false;
            $p->train($input, $output);

            $i++;
        }

        $this->assertFalse($p->test(array(1,1)));
        $this->assertFalse($p->test(array(0,1)));
        $this->assertFalse($p->test(array(1,0)));
        $this->assertTrue($p->test(array(0,0)));
    }
}