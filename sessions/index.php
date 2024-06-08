<!-- 1 задача -->
<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_data'] = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'salary' => $_POST['salary'],
        'other' => $_POST['other']
    ];

    header('Location: index2.php');
    exit;
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="number" name="age" placeholder="Age"><br>
    <input type="number" name="salary" placeholder="Salary"><br>
    <input type="text" name="other" placeholder="Other"><br>
    <button type="submit">Submit</button>
</form>