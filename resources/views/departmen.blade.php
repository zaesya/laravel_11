<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <style>
        h2{ font-weight: bold; text-align: center; margin-bottom: 20px; }
        table{ width: 100%; border-collapse: collapse; }
        th, td{ border: 1px solid black; padding: 10px; text-align: left; }
        th{ background-color: #f2f2f2; }
    </style>

    <h2>DATA DEPARTMEN</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departmens as $departmen)
                <tr>
                    <td>{{$departmen->id}}</td>
                    <td>{{$departmen->name}}</td>
                    <td>{{$departmen->desc}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
