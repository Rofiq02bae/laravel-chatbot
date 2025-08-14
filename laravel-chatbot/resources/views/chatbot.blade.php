<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatbot Berita</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .chat-container {
            width: 90%;
            max-width: 800px;
            height: 600px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 18px;
            word-wrap: break-word;
            animation: fadeIn 0.3s ease-in;
        }

        .user-message {
            background: #007bff;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            background: #f1f3f4;
            color: #333;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }

        .related-news {
            margin-top: 10px;
            padding: 10px;
            background: #e8f4f8;
            border-radius: 10px;
            border-left: 4px solid #007bff;
        }

        .news-item {
            margin: 8px 0;
            padding: 8px;
            background: white;
            border-radius: 8px;
            border-left: 3px solid #28a745;
        }

        .news-title {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }

        .news-summary {
            color: #666;
            font-size: 14px;
        }

        .chat-input-container {
            padding: 20px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .chat-input-form {
            display: flex;
            gap: 10px;
        }

        .chat-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .chat-input:focus {
            border-color: #007bff;
        }

        .chat-submit {
            padding: 12px 24px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .chat-submit:hover {
            transform: translateY(-2px);
        }

        .chat-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .typing-indicator {
            display: none;
            align-self: flex-start;
            background: #f1f3f4;
            padding: 12px 16px;
            border-radius: 18px;
            border-bottom-left-radius: 5px;
        }

        .typing-dots {
            display: flex;
            gap: 4px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: #999;
            border-radius: 50%;
            animation: typing 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.5;
            }
            30% {
                transform: translateY(-10px);
                opacity: 1;
            }
        }

        .empty-state {
            text-align: center;
            color: #666;
            font-style: italic;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            🤖 Chatbot Berita Indonesia
        </div>
        
        <div class="chat-messages" id="chatMessages">
            <div class="empty-state">
                Selamat datang! Tanya saya tentang berita terbaru di Indonesia.
                <br>
                Contoh: "berita teknologi" atau "info kesehatan"
            </div>
        </div>
        
        <div class="typing-indicator" id="typingIndicator">
            <div class="typing-dots">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>
        </div>
        
        <div class="chat-input-container">
            <form class="chat-input-form" id="chatForm">
                <input 
                    type="text" 
                    class="chat-input" 
                    id="questionInput" 
                    placeholder="Ketik pertanyaan Anda tentang berita..."
                    autocomplete="off"
                    required
                >
                <button type="submit" class="chat-submit" id="submitButton">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    <script>
        // Setup CSRF token untuk semua request AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Ambil elemen-elemen DOM
        const chatForm = document.getElementById('chatForm');
        const questionInput = document.getElementById('questionInput');
        const submitButton = document.getElementById('submitButton');
        const chatMessages = document.getElementById('chatMessages');
        const typingIndicator = document.getElementById('typingIndicator');

        // Flag untuk mencegah submit berulang
        let isSubmitting = false;

        // Event listener untuk form submit
        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            const question = questionInput.value.trim();
            if (!question) return;

            // Disable form dan tampilkan loading
            setLoading(true);
            
            // Hapus empty state jika ada
            const emptyState = chatMessages.querySelector('.empty-state');
            if (emptyState) {
                emptyState.remove();
            }

            // Tampilkan pesan user
            addMessage(question, 'user');
            
            // Clear input
            questionInput.value = '';
            
            // Tampilkan typing indicator
            showTypingIndicator();

            try {
                // Kirim request ke server
                const response = await fetch('/chatbot/ask', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        question: question
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                
                // Simulate delay untuk UX yang lebih baik
                setTimeout(() => {
                    hideTypingIndicator();
                    addBotResponse(data);
                    setLoading(false);
                }, 800);

            } catch (error) {
                console.error('Error:', error);
                hideTypingIndicator();
                addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', 'bot');
                setLoading(false);
            }
        });

        function setLoading(loading) {
            isSubmitting = loading;
            submitButton.disabled = loading;
            submitButton.textContent = loading ? 'Mengirim...' : 'Kirim';
            questionInput.disabled = loading;
        }

        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${sender}-message`;
            messageDiv.textContent = text;
            chatMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        function addBotResponse(data) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message bot-message';
            
            // Tambahkan jawaban utama
            const answerText = document.createElement('div');
            answerText.textContent = data.answer;
            messageDiv.appendChild(answerText);
            
            // Tambahkan berita terkait jika ada
            if (data.related_news && data.related_news.length > 0) {
                const relatedNewsDiv = document.createElement('div');
                relatedNewsDiv.className = 'related-news';
                
                const title = document.createElement('div');
                title.style.fontWeight = 'bold';
                title.style.marginBottom = '10px';
                title.textContent = '📰 Berita Terkait:';
                relatedNewsDiv.appendChild(title);
                
                data.related_news.forEach(news => {
                    const newsItem = document.createElement('div');
                    newsItem.className = 'news-item';
                    
                    const newsTitle = document.createElement('div');
                    newsTitle.className = 'news-title';
                    newsTitle.textContent = news.title;
                    
                    const newsSummary = document.createElement('div');
                    newsSummary.className = 'news-summary';
                    newsSummary.textContent = news.summary;
                    
                    const newsSource = document.createElement('div');
                    newsSource.style.fontSize = '12px';
                    newsSource.style.color = '#999';
                    newsSource.style.marginTop = '5px';
                    newsSource.textContent = `Sumber: ${news.source} | ${news.category}`;
                    
                    newsItem.appendChild(newsTitle);
                    newsItem.appendChild(newsSummary);
                    newsItem.appendChild(newsSource);
                    relatedNewsDiv.appendChild(newsItem);
                });
                
                messageDiv.appendChild(relatedNewsDiv);
            }
            
            chatMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        function showTypingIndicator() {
            typingIndicator.style.display = 'block';
            chatMessages.appendChild(typingIndicator);
            scrollToBottom();
        }

        function hideTypingIndicator() {
            typingIndicator.style.display = 'none';
        }

        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Auto focus pada input saat halaman dimuat
        questionInput.focus();

        // Submit dengan Enter key
        questionInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>
</html>
