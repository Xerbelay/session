<!-- 2 задача -->
<?php
session_start();

$questions = [
    "Кто президент России?" => ["Путин", "Медведев", "Сталин"],
    "Сколько будет 2 + 2?" => ["3", "4", "5"],
    "столицa Франции?" => ["Берлин", "Лондон", "Париж"]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userAnswers = $_POST['answers'];
    foreach ($questions as $question => $correctAnswers) {
        if (isset($userAnswers[$question]) && in_array($userAnswers[$question], $correctAnswers)) {
            $correctCount++;
        }
    }

    $_SESSION['test_results'] = $correctCount;
}
?>

<h2>Тест</h2>
<form method="post">
    <?php foreach ($questions as $question => $answers) : ?>
        <p><?php echo $question; ?></p>
        <?php foreach ($answers as $answer) : ?>
            <input type="radio" name="answers[<?php echo $question; ?>]" value="<?php echo $answer; ?>">
            <label><?php echo $answer; ?></label><br>
        <?php endforeach; ?>
    <?php endforeach; ?><br>
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_SESSION['test_results'])) {
    $score = $_SESSION['test_results'];
    echo "<p>Вы ответили правильно на $score вопросов из " . count($questions) . ".</p>";
}
?>