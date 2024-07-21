<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

    <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">

        <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Image
                </label>
                <div class="flex items-center">
                    <label for="image" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V7a4 4 0 018 0v9M5 12h14M7 16h10M12 16v2M9 16h6"></path>
                        </svg>
                        Choose File
                    </label>
                    <input type="file" name="image" id="image" class="hidden">
                </div>
            </div>

            <div class="mb-4 w-full h-32 overflow-hidden flex justify-center items-center">
                <img id="thumbnail" src="#" alt="Image preview" class="hidden w-full h-full object-cover rounded">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Upload
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const thumbnail = document.getElementById('thumbnail');
                    thumbnail.src = e.target.result;
                    thumbnail.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>
