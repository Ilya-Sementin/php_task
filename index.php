<?php
	$topics = [
		'Тема 1' => [
			'Подтема 1.1' => 'Текст для подтемы 1.1.',
			'Подтема 1.2' => 'Текст для подтемы 1.2.',
			'Подтема 1.3' => 'Текст для подтемы 1.3.'
		],
		'Тема 2' => [
			'Подтема 2.1' => 'Текст для подтемы 2.1.',
			'Подтема 2.2' => 'Текст для подтемы 2.2.',
			'Подтема 2.3' => 'Текст для подтемы 2.3.'
		],
		'Тема 3' => [
			'Подтема 3.1' => 'Текст для подтемы 3.1.',
			'Подтема 3.2' => 'Текст для подтемы 3.2.',
			'Подтема 3.3' => 'Текст для подтемы 3.3.'
		]
	];

	// Значения по умолчанию
	$defaultTopic = 'Тема 1';
	$defaultSubtopic = 'Подтема 1.1';

	// Тут либо значения по умолчанию (если в первый раз зашли на сайти), либо выбранные пользователем тема и подтема
	$selectedTopic = $_GET['topic'] ?? $defaultTopic;
	$selectedSubtopic = $_GET['subtopic'] ?? $defaultSubtopic;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css.css">
    <title>Темы и подтемы</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Темы</th>
                <th style="width: 20%;">Подтемы</th>
                <th>Содержание</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- Колонка с темами -->
                <td>
                    <div id="main_top">
                        <?php foreach ($topics as $topic => $subtopics): ?>
                            <a href="?topic=<?= urlencode($topic) ?>&subtopic=<?= urlencode(array_key_first($subtopics)) ?>"
                               class="topic <?= $topic === $selectedTopic ? 'selected' : '' ?>">
                                <?= $topic ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </td>
                
                <!-- Колонка с подтемами -->
                <td>
                    <div id="main_top">
                        <?php foreach ($topics[$selectedTopic] as $subtopic => $text): ?>
                            <a href="?topic=<?= urlencode($selectedTopic) ?>&subtopic=<?= urlencode($subtopic) ?>"
                               class="subtopic <?= $subtopic === $selectedSubtopic ? 'selected' : '' ?>">
                                <?= $subtopic ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </td>
                
                <!-- Колонка с содержанием -->
                <td>
                    <div id="content">
                        <?= $topics[$selectedTopic][$selectedSubtopic] ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>