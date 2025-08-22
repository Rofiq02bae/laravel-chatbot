<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Debug Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chatbot Debug Interface</h1>
        <div class="row">
            <div class="col-md-8">
                <form id="chat-form">
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan:</label>
                        <input type="text" class="form-control" id="question" name="question" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
                <hr>
                <h3>Jawaban:</h3>
                <div id="answer" class="alert alert-info" style="white-space: pre-wrap;"></div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('chat-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        const question = document.getElementById('question').value;
        const answerDiv = document.getElementById('answer');
        
        answerDiv.innerHTML = 'Loading...';
        
        try {
            const response = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ question })
            });
            
            if (response.ok) {
                const result = await response.json();
                answerDiv.innerHTML = result.answer || JSON.stringify(result, null, 2);
            } else {
                answerDiv.innerHTML = `Error: ${response.status} - ${await response.text()}`;
            }
        } catch (error) {
            answerDiv.innerHTML = `Error: ${error.message}`;
        }
    });
    </script>
</body>
</html>
