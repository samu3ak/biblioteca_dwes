<?php
session_start();
include "conexion.php";
if (!isset($_SESSION["login"])) {
    print "<script>window.location='../login.php';</script>";
} else {
    if (isset($_SESSION["login"])) {
        $q1 = $db->query("insert into carrito(client_email,created_at) values ('" . $_SESSION["correo"] . "',NOW())");
        if ($q1) {
            $cart_id = $db->insert_id;
            foreach ($_SESSION["cart"] as $c) {
                $q1 = $db->query("insert into carrito_producto(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
            }
            unset($_SESSION["cart"]);
        }
        print "<script>alert('Venta procesada exitosamente');window.location='../index.php';</script>";
    } else {
        print "<script>alert('Debe iniciar sesión para usar esta funcionalidad');window.location='../index.php';</script>";
    }
}
