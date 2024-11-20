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

    </style>
    <h2>DATA GRADE STUDENT</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name GRADE</th>
                <th>Name</th>
                <th>Departmen ID</th>
            </tr>
        </thead>
            <tbody>@foreach ( $grade_students as $grade_student)
                <tr>
                    <td>{{$grade_student->id}}</td>
                    <td>{{$grade_student->name}}</td>
                    <td>@foreach ($grade_student->students as $student)
                        <ul>
                            <li>{{ $student->name }}</li>
                        </ul>
                    @endforeach</td>
                    <td>{{$grade_student->departmen->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
