<p align="center" class="text-center" style="text-align:center;"><a href="https://github.com/i9w3b" target="_blank"><img src="https://cdn.jsdelivr.net/gh/i9w3b/cdn/img/logo-200px.png" width="200"></a></p>
<p align="center" class="text-center" style="text-align:center;">
<a href="https://github.com/i9w3b/laravel-menu-manager/blob/master/LICENSE.md"><img src="https://img.shields.io/github/license/i9w3b/laravel-menu-manager" alt="License"></a>
<a href="https://github.com/i9w3b/laravel-menu-manager"><img src="https://img.shields.io/github/languages/count/i9w3b/laravel-menu-manager" alt="GitHub Language Count"></a>
<a href="https://github.com/i9w3b/laravel-menu-manager"><img src="https://img.shields.io/github/repo-size/i9w3b/laravel-menu-manager" alt="GitHub Repo Size"></a>
<a href="https://github.com/i9w3b/laravel-menu-manager/releases"><img src="https://img.shields.io/github/v/release/i9w3b/laravel-menu-manager" alt="GitHub Release"></a>
<a href="https://packagist.org/packages/i9w3b/laravel-menu-manager"><img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/i9w3b/laravel-menu-manager"></a>
</p>

# Gerenciar Menu Laravel Arrastar/Soltar Como Wordpress

Bifurcado (forked) de https://github.com/lordmacu/wmenu
Configurado e Modificado para atender nossas necessidades, caso goste fique a vontade para usar
![Laravel drag and drop menu](https://cdn.jsdelivr.net/gh/i9w3b/cdn/packages/img/laravel-menu-manager.png)

## Instalação

Execute o seguinte comando:

```bash
composer require i9w3b/laravel-menu-manager
```

Publicar configurações e ativos:

```php
php artisan vendor:publish --provider="Harimayco\Menu\MenuServiceProvider"
```

Opcional:

- **_CUSTOM MIDDLEWARE:_** Adicionar middlewares
- **_TABLE PREFIX:_** Por padrão, o pacote criará 2 novas tabelas denominadas “menus” e “menu_items” 
- **_TABLE NAMES_** Nome específico de tabela
- **_Custom routes_** Editar o caminho da rota, pode editar o campo
- **_Role Access_** Ativar funções (permissões) nos itens de menu
- Outras configurações...

Execute o comando:

```php
php artisan migrate
```

Pronto

Publicar a rota para gerenciar os menus, para melhor gestão dos nossos projetos deixamos as rotas desabilitadas, para começar a usar tem que ativar as configurações `routes_view e routes_post` alterando os valores para `true`:

```php
// arquivo config/menu.php
/*
|--------------------------------------------------------------------------
| Publicar rota para gerenciar (get e post) menus | true ou false
|--------------------------------------------------------------------------
*/
'routes_view' => false,
'routes_post' => false,
```

## Exemplo de uso

No arquivo blade

```php
@extends('app')

@section('contents')
    {!! Menu::render() !!}
@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
```

Usando as classes

```php
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
```

## Exemplo de uso do menu (a)
Um menu básico de dois níveis pode ser exibido no seu modelo blade

```php
// Obter o menu por ID
$menu = Menus::find(1);

// Ou por nome
$menu = Menus::where('name','Test Menu')->first();

// Ou obtenha o menu pelo nome e os itens (RECOMENDADO para melhor desempenho e menos chamadas de consulta)
$menu = Menus::where('name','Test Menu')->with('items')->first();

// Ou acesse
$menu = Menus::where('id', 1)->with('items')->first();

// Acessar o resultado
$public_menu = $menu->items;

// Ou converta em array
$public_menu = $menu->items->toArray();
```

## Exemplo de uso do menu (b)
Agora, dentro do seu arquivo de modelo blade, coloque o menu usando este exemplo

```php
<div class="nav-wrap">
    <div class="btn-menu">
        <span></span>
    </div>
    <nav id="mainnav" class="mainnav">
        @if($public_menu)
        <ul class="menu">
            @foreach($public_menu as $menu)
            <li class="">
                <a href="{{ $menu['link'] }}" title="">{{ $menu['label'] }}</a>
                @if( $menu['child'] )
                <ul class="sub-menu">
                    @foreach( $menu['child'] as $child )
                        <li class=""><a href="{{ $child['link'] }}" title="">{{ $child['label'] }}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        @endif
        </ul>
    </nav>
 </div>
```

Obter itens de menu por ID

```php
use Harimayco\Menu\Facades\Menu;

$menuList = Menu::get(1);
```

Obter itens de menu por nome
Neste exemplo, você deve ter um menu chamado Admin

```php
use Harimayco\Menu\Facades\Menu;

$menuList = Menu::getByName('Admin');
```

## Costomização

Você pode editar a interface do menu em **_resources/views/vendor/wmenu/menu-html.blade.php_**

Para a customização acima use:

```php
php artisan vendor:publish --provider="Harimayco\Menu\MenuServiceProvider"
```

## Segurança

Caso descubra algum problema relacionado à segurança, envie um e-mail para `marcelosenaonline@gmail.com` em vez de usar o rastreador de problemas.

## Licença

[MIT](https://github.com/i9w3b/lang/blob/master/LICENSE.md) © [i9W3b](https://github.com/i9w3b) | Consulte [LICENSE.md](https://github.com/i9w3b/lang/blob/master/LICENSE.md) para obter mais informações.
