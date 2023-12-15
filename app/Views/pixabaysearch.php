<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixabay Image and Video Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #search-form {
            display: flex;
            margin-bottom: 20px;
        }

        #search-input {
            flex: 1;
            padding: 10px;
            font-size: 16px;
        }

        #search-btn {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        #video-btn {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        #results {
            display: flex;
            flex-wrap: wrap;
        }

        .result-item {
            margin: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <h1>Pixabay Image and Video Search</h1>

    <div id="search-form">
        <input type="text" id="search-input" placeholder="Enter search term...">
        <button id="search-btn">Search</button>
        <button id="video-btn">Search Videos</button>
    </div>

    <div id="results"></div>

    <script>
        // Replace YOUR_PIXABAY_API_KEY with your actual Pixabay API key
        const apiKey = '40962545-45d9be6570b3bc22b9244fb06';
        const apiUrl = 'https://pixabay.com/api/';

        document.getElementById('search-btn').addEventListener('click', function() {
            const searchTerm = document.getElementById('search-input').value;
            fetchResults(searchTerm);
        });

        document.getElementById('video-btn').addEventListener('click', function() {
            const searchTerm = document.getElementById('search-input').value;
            fetchResults(searchTerm, 'video');
        });

        function fetchResults(searchTerm, type = 'photo') {
            // Make sure the search term is not empty
            if (searchTerm.trim() !== '') {
                // Construct the API request URL
                const requestUrl = `${apiUrl}?key=${apiKey}&q=${encodeURIComponent(searchTerm)}&image_type=${type}`;

                // Make the API request
                fetch(requestUrl)
                    .then(response => response.json())
                    .then(data => displayResults(data.hits))
                    .catch(error => console.error('Error fetching data:', error));
            }
        }

        function displayResults(results) {
            const resultsContainer = document.getElementById('results');

            // Clear previous results
            resultsContainer.innerHTML = '';

            // Display new results
            results.forEach(result => {
                const resultItem = document.createElement('div');
                resultItem.classList.add('result-item');

                if (result.type === 'photo') {
                    // Display image
                    const image = document.createElement('img');
                    image.src = result.webformatURL;
                    resultItem.appendChild(image);
                } else if (result.type === 'video') {
                    // Display video (for videos, Pixabay provides a preview URL)
                    const video = document.createElement('video');
                    video.src = result.videos.tiny.url;
                    video.setAttribute('controls', 'controls');
                    resultItem.appendChild(video);
                }

                resultsContainer.appendChild(resultItem);
            });
        }
    </script>

</body>
</html>
