<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route("users")}}">Laravel 11 & API </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route("FormCreate")}}">create</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
    </nav>

    <div class="m-5 p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody id="user-table-body">
                <!-- Dados dos usuários serão preenchidos aqui -->
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination">
            <!-- Paginação será preenchida aqui -->
        </ul>
    </nav>

    <script>
        const apiUrl = 'http://127.0.0.1:8000/api/users';

        async function fetchUsers(page = 1) {
            try {
                const response = await fetch(`${apiUrl}?page=${page}`);
                const data = await response.json();

                if (data.status) {
                    populateTable(data.users.data);
                    populatePagination(data.users);
                }
            } catch (error) {
                console.error('Erro ao buscar usuários:', error);
            }
        }

        function populateTable(users) {
            const tableBody = document.getElementById('user-table-body');
            tableBody.innerHTML = ''; // Limpa a tabela

            users.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <th scope="row">${user.id}</th>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        Editar
                    </button>
                    <button type="button" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        Apagar
                    </button>
                </td>
            `;
                tableBody.appendChild(row);
            });
        }

        function populatePagination(pagination) {
            const paginationElement = document.getElementById('pagination');
            paginationElement.innerHTML = ''; // Limpa a paginação

            // Página anterior
            const prevPage = document.createElement('li');
            prevPage.className = 'page-item';
            prevPage.innerHTML = `
            <a class="page-link" href="#" aria-label="Previous" ${pagination.prev_page_url ? '' : 'disabled'}>
                <span aria-hidden="true">&laquo;</span>
            </a>
        `;
            prevPage.addEventListener('click', () => {
                if (pagination.prev_page_url) fetchUsers(pagination.current_page - 1);
            });
            paginationElement.appendChild(prevPage);

            // Páginas
            pagination.links.forEach(link => {
                const pageItem = document.createElement('li');
                pageItem.className = `page-item ${link.active ? 'active' : ''}`;
                pageItem.innerHTML = `<a class="page-link" href="#">${link.label}</a>`;
                pageItem.addEventListener('click', () => {
                    if (link.url) fetchUsers(new URL(link.url).searchParams.get('page'));
                });
                paginationElement.appendChild(pageItem);
            });

            // Próxima página
            const nextPage = document.createElement('li');
            nextPage.className = 'page-item';
            nextPage.innerHTML = `
            <a class="page-link" href="#" aria-label="Next" ${pagination.next_page_url ? '' : 'disabled'}>
                <span aria-hidden="true">&raquo;</span>
            </a>
        `;
            nextPage.addEventListener('click', () => {
                if (pagination.next_page_url) fetchUsers(pagination.current_page + 1);
            });
            paginationElement.appendChild(nextPage);
        }

        // Busca inicial de usuários na página 1
        fetchUsers();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>