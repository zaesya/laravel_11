<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <style>
        h2{
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th{
            background-color: #f2f2f2;
        }

        .btn{
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;  /* Mengubah dari 'move' ke 'pointer' */
            margin-bottom: 20px;
        }

        .btn:hover{
            background-color: #0056b3;
        }
    </style>
    <div>
        <h2>DATA STUDENT</h2>
           <div>
            <a href="{{ route('add.data') }}" class="btn">+ Add New Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Departmen ID</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->grade_student->name}}</td>
                        <td>{{$student->grade_student->departmen->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->address}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
