<?php
class Employee {
    private $position;
    private $civilStatus;
    private $employmentStatus;
    private $hoursWorked;
    private $regularPay;
    private $overtimePay;
    private $deductions;

    public function __construct($position, $civilStatus, $employmentStatus, $hoursWorked, $regularPay, $overtimePay, $deductions) {
        $this->position = $position;
        $this->civilStatus = $civilStatus;
        $this->employmentStatus = $employmentStatus;
        $this->hoursWorked = $hoursWorked;
        $this->regularPay = $regularPay;
        $this->overtimePay = $overtimePay;
        $this->deductions = $deductions;
    }

    public function getGrossIncome() {
        return $this->regularPay + $this->overtimePay;
    }

    public function getNetIncome() {
        return $this->getGrossIncome() - $this->deductions;
    }

    public function displayEmployeeInfo() {
        echo "Employee Information:<br>";
        echo "Position: " . $this->position . "<br>";
        echo "Civil Status: " . $this->civilStatus . "<br>";
        echo "Employment Status: " . $this->employmentStatus . "<br>";
        echo "Hours Worked: " . $this->hoursWorked . "<br>";
        echo "Gross Income: " . $this->getGrossIncome() . "<br>";
        echo "Net Income: " . $this->getNetIncome() . "<br>";
    }
}

// Example usage
// $employee1 = new Employee("Software Engineer", "Married", "Full-time", 40, 50000, 10000, 5000);
// $employee1->displayEmployeeInfo();
?>
