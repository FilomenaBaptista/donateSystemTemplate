@extends('layouts.app')


@section('content')
    <style>
        ul.pagination {
            justify-content: center;
        }

        .custom-file-upload {
            display: inline-block;
            cursor: pointer;
            font-size: 20px;
            color: #007bff;
            /* Cor azul */
        }

        /* Escondendo o input de file */
        #customFile {
            display: none;
        }
    </style>

    <main id="main">

        <!-- ======= Blog Details Section ======= -->
        <section id="Perfil-User-theme" class="blog">
            <div class="container-fluid perfil-user" data-aos="fade-up">

                <table class="table">

                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefone }}</td>
                                <td><i class="bi bi-pencil"></i></td>
                                <td><i class="bi bi-trash-fill"></i></td>
                            </tr>
                        @empty
                            <h1 style=" margin-top: 300px;text-align: center;color: #0EA2BD;">Nenhuma usuario encontrado
                            </h1>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
