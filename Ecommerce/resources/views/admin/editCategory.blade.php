<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Light grey background */
            color: #333;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #e91e63; /* Pink color */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group button {
            background-color: #e91e63; /* Pink color */
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #d81b60; /* Darker pink color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('admin.update_category', ['category'=>$category]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="category_name" value="{{$category->category_name}}" required>
                <input type="submit" value="Update information">
            </div>
        </form>
    </div>
</body>
</html>
