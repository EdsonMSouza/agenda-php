# AGENDA PHP

<code><img height="50" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png"></code>
<code><img height="50" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/mysql/mysql.png"></code>

Pequeno projeto de uma agenda mostrando recursos do PHP como o uso de `SESSIONS`, biblioteca `PDO` para acesso a dados e uso de `POO` (Programação Orientada a Objetos).

É importante destacar que alguns recursos não estão implementados, bem como não tem o objetivo de utilizar técnicas avançadas de programação em PHP.

Desta forma, fica a recomendação para implementar os recursos ausentes para fins de estudo.
 
# VERSÃO PHP
```html
PHP 7.4.3 (cli) (built: Jul  5 2021 15:13:35) ( NTS )
Copyright (c) The PHP Group Zend Engine v3.4.0,
Copyright (c) Zend Technologies with Zend OPcache v7.4.3,
Copyright (c), by Zend Technologies
```

### Scripts SQL

```sql
CREATE DATABASE name;
```

```sql
CREATE TABLE usuarios
(
    id       INT(3)         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome     VARCHAR(50)    NOT NULL,
    usuario  VARCHAR(32)    NOT NULL,
    senha    VARCHAR(32)    NOT NULL
);
```

```sql
CREATE TABLE contatos
(
    id           INT(3)         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario_id   INT(3)         NOT NULL,
    nome         VARCHAR(50)    NOT NULL,
    email        VARCHAR(50)    NOT NULL,
    telefone     VARCHAR(20)    NOT NULL
);
```

## Composer

As alterações em classes deverão ser atualizadas utilizando o comando <code>composer dump-autoload -o</code> na sua máquina local.

## Como citar este conteúdo

```
DE SOUZA, Edson Melo (2021, November 16). Agenda PHP.
Available in: https://github.com/EdsonMSouza/agenda-php
```

Ou BibTeX para LaTeX:

```latex
@misc{desouza2020phpapi,
  author = {DE SOUZA, Edson Melo},
  title = {Agenda PHP},
  url = {https://github.com/EdsonMSouza/agenda-php},
  year = {2021},
  month = {November}
}
```

## License

[![CC BY-SA 4.0][cc-by-sa-shield]][cc-by-sa]

This work is licensed under a
[Creative Commons Attribution-ShareAlike 4.0 International License][cc-by-sa].

[![CC BY-SA 4.0][cc-by-sa-image]][cc-by-sa]

[cc-by-sa]: http://creativecommons.org/licenses/by-sa/4.0/

[cc-by-sa-image]: https://licensebuttons.net/l/by-sa/4.0/88x31.png

[cc-by-sa-shield]: https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg