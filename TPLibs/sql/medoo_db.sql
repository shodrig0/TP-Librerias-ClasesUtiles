-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 05:18:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

CREATE DATABASE medoo_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

CREATE TABLE `rol` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Profesor'),
(2, 'Alumno');

CREATE TABLE `usuario` (
  `legajo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `rol` bigint(20) NOT NULL,  -- Cambiado de varchar(10) a bigint para referenciar correctamente la tabla `rol`
  PRIMARY KEY (`legajo`),
  FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE ON DELETE RESTRICT
) AUTO_INCREMENT=4001 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;