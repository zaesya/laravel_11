<x-layout>
    <x-slot:title>
       {{ $title }}
    </x-slot:title>
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .button-group{
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        .btn-cancel {
            background-color: #6c757d;
        }

        .btn-cancel:hover{
            background-color: #5a6268;
        }

        .btn-sumbit:hover {
            background-color: #0056b3;
        }
    </style>

    <h3 style="text-align: center;">Add New Student</h3>

    <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter student's name">

        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" placeholder="Enter grade">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter address">
        <div class="button-group">
        <a href="/student" class="btn btn-cancel">Cancel</a>
        <button type="submit" class="btn btn-submit">Submit</button>
        </div>

    </form>
</x-layout>
