<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Quiz Calculator</h1>
        <form id="quizForm">
            <div class="form-group">
                <label for="numQuizzes">Number of Quizzes:</label>
                <input type="number" class="form-control" id="numQuizzes" min="1" required>
            </div>
            <div id="quizInputs" class="form-group">
                <!-- Quiz inputs will be added here -->
            </div>
            <button type="submit" class="btn btn-primary">Calculate Average</button>
        </form>
        <div id="result" class="mt-3"></div>
    </div>

    <script>
        const quizForm = document.getElementById('quizForm');
        const quizInputs = document.getElementById('quizInputs');
        const result = document.getElementById('result');

        document.getElementById('numQuizzes').addEventListener('input', function () {
            const numQuizzes = parseInt(this.value);

            // Clear previous inputs
            quizInputs.innerHTML = '';

            // Add input fields for each quiz
            for (let i = 1; i <= numQuizzes; i++) {
                const inputGroup = document.createElement('div');
                inputGroup.classList.add('input-group', 'mb-3');
                
                const label = document.createElement('label');
                label.textContent = `Quiz ${i}:`;
                label.classList.add('input-group-prepend');
                label.classList.add('input-group-text');
                inputGroup.appendChild(label);

                const input = document.createElement('input');
                input.type = 'number';
                input.classList.add('form-control');
                input.min = '0';
                input.max = '100';
                input.required = true;
                inputGroup.appendChild(input);

                quizInputs.appendChild(inputGroup);
            }
        });

        quizForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent form submission

            const quizInputs = document.querySelectorAll('#quizInputs input');
            const grades = [];

            quizInputs.forEach(input => {
                grades.push(parseFloat(input.value));
            });

            if (grades.length > 0) {
                const average = grades.reduce((sum, grade) => sum + grade, 0) / grades.length;
                result.innerHTML = `<p class="alert alert-success">The average grade is: ${average.toFixed(2)}</p>`;
            } else {
                result.innerHTML = `<p class="alert alert-danger">Please enter grades for all quizzes.</p>`;
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

