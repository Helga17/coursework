<?php
?>
<i class="fa fa-child" v-on:click="showAuthenticationForm()"></i>

<div class="authentication" v-bind:hidden="hiddenAuthenticationForm">
    <div class="modal">
        <span v-on:click="closeAuthenticationForm()" class="close" title="Close Modal">&times;</span>
        <div class="container">
            <img src="images/trees.png" alt="">
            <hr>
            <button type="button" class="cancel" v-on:click="isAuthorization = !isAuthorization;">
                {{changeAuthentication}}
            </button>
            <div class="authentication-form" v-bind:hidden="!isFirstOpen">
                <div class="authentication-form-element" v-bind:hidden="isAuthorization">
                    <label for="name"><b>Ім'я</b></label>
                    <input type="text" placeholder="Введіть ім'я" v-model="userName" required>
                </div>
                <div class="authentication-form-element">
                    <label for="email"><b>Пошта</b></label>
                    <input type="text" placeholder="Введіть пошту" v-model="userEmail" required>
                </div>
                <div class="authentication-form-element">
                    <label for="psw"><b>Пароль</b></label>
                    <input type="password" placeholder="Введіть пароль" v-model="userPassword" required>
                </div>
                <div class="authentication-form-element" v-bind:hidden="isAuthorization">
                    <label for="psw-repeat"><b>Повторіть пароль</b></label>
                    <input type="password" placeholder="Повторіть пароль" v-model="userRepeatingPassword" required>
                </div>
                <button type="button" class="cancel">
                    Скасувати
                </button>
                <button type="button" class="authentication-button" v-on:click="authentication()">
                    {{authenticationButton}}
                </button>
            </div>
        </div>
    </div>
</div>