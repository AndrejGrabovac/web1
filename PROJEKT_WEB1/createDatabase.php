<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "library3";

    $MySQLi = @new MySQLi($server, $username, $password, $database);
    if($MySQLi->connect_errno){
        print('Spojeno');
    }
    
    $sql = "CREATE DATABASE IF NOT EXISTS library3";
    if($MySQLi->query($sql)){
        print('Baza kreirana');
    }
    else{
        print('Baza nije kreirana');
    }

    $sql = "CREATE TABLE book(
            redniBroj int(11) NOT NULL auto_increment PRIMARY KEY,
            sifraKnjige int NOT NULL,
            nazivKnjige varchar(255) NOT NULL default '',
            autorKnjige varchar(255) NOT NULL default '',
            godinaIzdavanja	 int NOT NULL,
            ukupanBrojPrimjeraka int NOT NULL,
            brojDostupnihPrimjeraka int not null
    )ENGINE=InnoDB DEFAULT CHARSET = utf8";

    if($MySQLi->query($sql)){
        print('Knjiga kreirana');
    }

    $sql = "CREATE TABLE members(
        memberID int(11) NOT NULL auto_increment PRIMARY KEY,
        memberName varchar(255) NOT NULL default '',
        memberLastName varchar(255) NOT NULL,
        email varchar(255) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET = utf8";

    if($MySQLi->query($sql)){
        print('Clan kreiran');
    }

?>