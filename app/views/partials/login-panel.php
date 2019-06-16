<?php
?>
<div class="authentication" v-bind:hidden="hiddenAuthenticationForm">
    <div class="modal-form">
        <span v-on:click="closeAuthenticationForm()" class="close" title="Close Modal">&times;</span>
        <div class="container">
            <img src="images/trees.png" alt="">
            <hr>
            <div class="tab-buttons">
                <div class="tab" v-on:click="isAuthorization = false" v-bind:class="!isAuthorization ? 'active-tab' : ''">Реєстрація</div>
                <div class="tab" v-on:click="isAuthorization = true" v-bind:class="isAuthorization ? 'active-tab' : ''">Авторизація</div>
            </div>
            <div class="authentication-form">
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
                <button type="button" class="authentication-button" v-on:click="authentication()">
                    {{authenticationButton}}
                </button>
            </div>
        </div>
    </div>
</div>