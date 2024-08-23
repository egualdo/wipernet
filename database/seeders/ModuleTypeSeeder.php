<?php

namespace Database\Seeders;

use App\Models\ModuleType;
use Illuminate\Database\Seeder;

class ModuleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $mts = [
            [
                'name' => 'rebrand2',
                'preview' => 'https://wiperagency.nyc3.digitaloceanspaces.com/wipersite/IfvZxKwzV1b06sepMON5Mx7pOrAFojraXxKQQ8cd.jpg',
                'html' => "<section class= \"rebrand \">\r\n     <div class= \"container \">\r\n              <div class= \"row flex-column-reverse flex-lg-row \">\r\n                                <div class= \"col-12 col-lg-3 \">\r\n                                                     <img src= \"imagen \" class= \"img-fluid\" >\r\n                                <\/div>\r\n                                <div class= \"col-12 col-lg-9 \">\r\n                                <div class= \"info-rebrand \">\r\n                                    <h2>titulo<\/h2>\r\n                                    <p>descripcion<\/p>\r\n                                    <a href=\"link\" target=\"_blank\">link<\/a>\r\n                                    <\/div>\r\n                                <\/div>\r\n                                <\/div>\r\n                                <\/div>\r\n<\/section>",
                'json_fields' => '"[{\"tag\":\"img\"},{\"tag\":\"h\"},{\"tag\":\"p\"},{\"tag\":\"a\"}]"',
            ],
           [
                'name' => 'video-campana2',
                'preview' => 'https://wiperagency.nyc3.digitaloceanspaces.com/wipersite/N8viwCYWi687lInGDnI6UqaIonoLp28jIqiDnyqV.jpg',
                'html' => "<section class=\"video-campana\">\r\n<div class=\"container\">\r\n    <div class=\"row\">\r\n        <div class=\"col-12\">\r\n            <div class=\"video-color\">\r\n            <div class=\"bg-color\">\r\n                <h2>titulo <\/h2>\r\n            <\/div>\r\n            <video autoplay controls>\r\n                <source src=\"videos\"       type=\"video\/mp4\">\r\n                    Your browser does not support the video tag.\r\n            <\/video>\r\n        <\/div>\r\n        <div class=\"mensaje\">\r\n            <p> descripcion<\/p>\r\n            <a href=\"link\" target=\"_blank\">link<\/a>\r\n        <\/div>\r\n    <\/div>\r\n    <\/div>\r\n    <\/div>\r\n    <\/section>",
                'json_fields' => "[{\"tag\":\"videos\"},{\"tag\":\"h\"},{\"tag\":\"p\"},{\"tag\":\"a\"}]",
            ],
            [
                'name' => 'title-foto2',
                'preview' => 'https://wiperagency.nyc3.digitaloceanspaces.com/wipersite/VSAlFRpDZwHYidW613IwUK3p5jlIzRDrzjeFSaYq.jpg',
                'html' => "<section class=\"packaging\">\r\n         <div class=\"container\">  \r\n            <div class=\"row\">  \r\n                <div class=\"col-12 col-lg-5\">  \r\n                    <div class=\"info-packaging\"> \r\n                       <h2>titulo<\/h2>  \r\n                       <p>descripcion<\/p>\r\n                       <a href=\"link\" target=\"_blank\">link<\/a>\r\n                    <\/div>\r\n                <\/div> \r\n                <div class=\"col-12 col-lg-7\"> \r\n                    <img src=\"imagen\" class=\"img-fluid\">\r\n                <\/div>\r\n                <div class=\"txt-bg text-start\">texto\r\n                <\/div>\r\n            <\/div>\r\n        <\/div>\r\n    <\/section>",
                'json_fields' => "[{\"tag\":\"img\"},{\"tag\":\"h\"},{\"tag\":\"p\"},{\"tag\":\"text\"},{\"tag\":\"a\"}]",
            ],
            [
                'name' => 'top2',
                'preview' => 'https://wiperagency.nyc3.digitaloceanspaces.com/wipersite/UPAKk5Q1LWXldrUrEwp93xmQG7PaNELqigyI4DCI.jpg',
                'html' => "<div class=\"container-fluid\"> \r\n        <div class=\"row\">\r\n            <div class=\"col-12 no-pading\">\r\n                <div class=\"top-case\" style=\"background-image:url('imagen')\">\r\n                    <video width=\"320\" height=\"240\" autoplay muted >\r\n                        <source src=\"videos\" type=\"video\/mp4\">\r\n                        Your browser does not support the video tag.\r\n                    <\/video>\r\n                <\/div>\r\n            <\/div>\r\n        <\/div>\r\n    <\/div>",
                'json_fields' => "[{\"tag\":\"img\"},{\"tag\":\"videos\"}]",
            ],
            [
                'name' => 'packaging2',
                'preview' => 'https://wiperagency.nyc3.digitaloceanspaces.com/wipersite/nk4Y6bmXqiUDzTTXoqNp5rhyZ0oyjYB4gixEQ7tM.jpg',
                'html' => "<section class=\"packaging\">\r\n        <div class=\"container\">\r\n            <div class=\"row flex-column-reverse flex-lg-row\">\r\n                <div class=\"col-12 col-lg-9\">\r\n                    <img src=\"imagen\" class=\"img-fluid\">\r\n                <\/div>\r\n                <div class=\"col-12 col-lg-3\">\r\n                    <div class=\"info-packaging\">\r\n                        <h2>titulo<\/h2>\r\n                            <p>descripcion<\/p>\r\n                            <a href=\"link\" target=\"_blank\">link<\/a>\r\n                    <\/div>\r\n                <\/div>\r\n                <div class=\"txt-bg text-end\">texto\r\n                <\/div>\r\n            <\/div>\r\n        <\/div>\r\n    <\/section>",
                'json_fields' => "[{\"tag\":\"img\"},{\"tag\":\"h\"},{\"tag\":\"p\"},{\"tag\":\"text\"},{\"tag\":\"a\"}]",
            ],
        ];

        foreach ($mts as $mt) {
            ModuleType::create($mt);
        }
    }
}
