<?php

test('the home page redirects to authors', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('authors.index'));
});
