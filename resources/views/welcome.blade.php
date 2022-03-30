<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentação</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .p-10 {
            padding: 10px
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .codeclass {
            background-color: #f1f3f4 !important;
            border-radius: 8px;
            padding: 10px;
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <a href="https://inicie.digital/" target="_blank"><img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03-2048x830.png" width="160"></a>


            </div>
            <h3>Documentação das requisições</h3>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-10">
                                <h5>Retorno de sucesso (POST / PUT / DELETE): </h5>
                                <div class="codeclass">
                                    {<br />
                                    &nbsp;&nbsp;"success": true,<br />
                                    &nbsp;&nbsp;"msg": "Mensagem de sucesso!",<br />
                                    &nbsp;&nbsp;"body": {} #objeto do módulo cadastrado <br />
                                    }<br />
                                </div>

                            </div>
                            <div class="p-10">
                                <h5>Retorno com falha (POST / PUT / DELETE):</h5>
                                <div class="codeclass">
                                    {<br />
                                    &nbsp;&nbsp;"success": false,<br />
                                    &nbsp;&nbsp;"error": "Mensagem de erro"<br />
                                    }<br />
                                </div>
                            </div>
                        </div>

                        <div class="p-10">
                            <h5>Retorno das listagens (GET):</h5>
                            <div class="codeclass grid md:grid-cols-2">
                                <div><b>Listar todos</b>- [] #Array de objetos do módulo listado</div>
                                <div><b>Listar po id</b>- {} #Objeto do módulo listado</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#users" class="underline text-gray-900 dark:text-white">Usuários</a></div>
                        </div>

                        <div class="ml-12" id="users">
                            <h5>Endpoints: </h5>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <p><b>GET: /users </b>- Listar todos os usuários</p>
                                <p><b>GET: /users/{id}</b> - Listar usuário por id</p>
                                <p><b>GET: /users/{id}/go_rest</b> - Listar pelo id da API de integração (go rest)</p>
                                <p><b>POST: /users</b> - Cadastrar novo usuários</p>
                                <p><b>POST: /users_sync</b> - Sincroniza usuários da API de integração (go rest) e salva no banco local</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-10">
                                    <h5>Json para cadastro: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"name": "Sduhty3",<br />
                                        &nbsp;&nbsp;"email": "sduhty3@test.com",<br />
                                        &nbsp;&nbsp;"gender": "male"<br />
                                        }<br />
                                    </div>
                                </div>
                                <div class="p-10">
                                    <h5>Objeto do usuário: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"id": 47<br />
                                        &nbsp;&nbsp;"name": "Sduhty1",<br />
                                        &nbsp;&nbsp;"email": "sduhty1@test.com",<br />
                                        &nbsp;&nbsp;"gender": "male",<br />
                                        &nbsp;&nbsp;"status": "active",<br />
                                        &nbsp;&nbsp;"go_rest_id": 4705,<br />
                                        &nbsp;&nbsp;"updated_at": "2022-03-29T10:57:12.000000Z",<br />
                                        &nbsp;&nbsp;"created_at": "2022-03-29T10:57:12.000000Z",<br />
                                        }<br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#posts" class="underline text-gray-900 dark:text-white">Posts</a></div>
                        </div>

                        <div class="ml-12" id="posts">
                            <h5>Endpoints: </h5>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <p><b>GET: /posts </b>- Listar todos os posts registrados</p>
                                <p><b>POST: /posts</b> - Cadastrar novo post</p>
                                <p><b>GET: /posts/{id}/comments</b> - Lista o post do id informado e seus comentários</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-10">
                                    <h5>Json para cadastro: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"user_id": 47,<br />
                                        &nbsp;&nbsp;"title": "Teste post",<br />
                                        &nbsp;&nbsp;"body": "Mensagem do post"<br />
                                        }<br />
                                    </div>
                                </div>
                                <div class="p-10">
                                    <h5>Objeto do post: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"id": 4<br />
                                        &nbsp;&nbsp;"user_id": 47,<br />
                                        &nbsp;&nbsp;"title": "Teste post",<br />
                                        &nbsp;&nbsp;"body": "Mensagem do post",<br />
                                        &nbsp;&nbsp;"go_rest_id": 2045,<br />
                                        &nbsp;&nbsp;"updated_at": "2022-03-29T11:10:08.000000Z",<br />
                                        &nbsp;&nbsp;"created_at": "2022-03-29T11:10:08.000000Z",<br />
                                        }<br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="#comments" class="underline text-gray-900 dark:text-white">Commentários</a></div>
                        </div>
                        <div class="ml-12" id="posts">
                            <h5>Endpoints: </h5>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <p><b>GET: /comments </b>- Listar todos os comentários registrados</p>
                                <p><b>POST: /comments</b> - Cadastrar novo comentário</p>
                                <p><b>POST: /comments/first</b> - Cadastrar comentário no post mais recente</p>
                                <p><b>DELETE: /comments/{id}</b> -Deletar comentário pelo ID</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-10">
                                    <h5>Json para cadastro: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"post_id": 2,<br />
                                        &nbsp;&nbsp;"name": "Akhalarah",<br />
                                        &nbsp;&nbsp;"email": "ak@test.com",<br />
                                        &nbsp;&nbsp;"body": "Comment Save"<br />
                                        }<br />
                                    </div>
                                </div>
                                <div class="p-10">
                                    <h5>Objeto do comentário: </h5>
                                    <div class="codeclass">
                                        {<br />
                                        &nbsp;&nbsp;"id": 7<br />
                                        &nbsp;&nbsp;"name": "Akhalarah",<br />
                                        &nbsp;&nbsp;"email": "ak@test.com",<br />
                                        &nbsp;&nbsp;"body": "Comment Save",<br />
                                        &nbsp;&nbsp;"post_id": 2,<br />
                                        &nbsp;&nbsp;"go_rest_id": 2024,<br />
                                        &nbsp;&nbsp;"updated_at": "2022-03-29T11:22:46.000000Z",<br />
                                        &nbsp;&nbsp;"created_at": "2022-03-29T11:22:46.000000Z",<br />
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>