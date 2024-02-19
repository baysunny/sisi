document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
              nav = document.getElementById(navId),
              bodypd = document.getElementById(bodyId),
              headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show');
                // change icon
                toggle.classList.toggle('bx-x');
                // add padding to body
                bodypd.classList.toggle('body-pd');
                // add padding to header
                headerpd.classList.toggle('body-pd');
            });
        }
    };

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link');

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink));

    // Your code to run since DOM is loaded and ready
});



function submitForm(btn) {
    btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading';
    btn.disabled = true;
    btn.form.submit();
}
document.addEventListener('DOMContentLoaded', function() {
    let toastElement = document.getElementById('liveToast');
    if (toastElement) {
        let toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});
$(document).ready(function() {
    
    $('body').on("change", "#floatingIcon",  function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#iconPreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }else{
            $('#iconPreview').attr('src', defaultIcon);
        }
    });
    
    $('#user_foto').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }else{
            $('#imagePreview').attr('src', defaultFoto);
        }
    });

    $('.btn-add-menuLevel').click(function() {
        $.ajax({
            url: '/dashboard/menu-levels/create',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-danger').addClass('bg-primary');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Add Menu Level');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data: ', error);
                }
            }
        });
    });
    $('.btn-edit-menuLevel').click(function() {
        var menuLevelId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menu-levels/' + menuLevelId + '/edit',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-danger').removeClass('bg-primary').addClass('bg-success');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Edit Menu Level');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });
    $('.btn-delete-menuLevel').click(function() {
        var menuLevelId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menu-levels/' + menuLevelId + '/delete',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-primary').addClass('bg-danger');
                $('#staticBackdropLabel').html('<i class="fa fa-trash"></i> Delete');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });

    $(document).on('click', '.btn-add-menu', function() {
        $.ajax({
            url: '/dashboard/menus/create',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-danger').addClass('bg-primary');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Add Menu');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data: ', error);
                }
            }
        });
    });
    $('.btn-edit-menu').click(function() {
        var menuId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menus/' + menuId + '/edit',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-danger').removeClass('bg-primary').addClass('bg-success');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Edit Menu');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });
    $('.btn-delete-menu').click(function() {
        var menuId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menus/' + menuId + '/delete',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-primary').addClass('bg-danger');
                $('#staticBackdropLabel').html('<i class="fa fa-trash"></i> Delete');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });

    $('.btn-add-menuUser').click(function() {
        $.ajax({
            url: '/dashboard/menu-users/create',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-danger').addClass('bg-primary');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Add User to the Menu');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data: ', error);
                }
            }
        });
    });
    $('.btn-edit-menuUser').click(function() {
        var menuUserId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menu-users/' + menuUserId + '/edit',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-danger').removeClass('bg-primary').addClass('bg-success');
                $('#staticBackdropLabel').html('<i class="fa fa-edit"></i> Edit access');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });
    $('.btn-delete-menuUser').click(function() {
        var menuUserId = $(this).data('id');

        $.ajax({
            url: '/dashboard/menu-users/' + menuUserId + '/delete',
            method: 'GET',
            success: function(response) {
                $('.modal-header').removeClass('bg-success').removeClass('bg-primary').addClass('bg-danger');
                $('#staticBackdropLabel').html('<i class="fa fa-trash"></i> Delete access');
                $('#data-to-display').html(response);
                $('#cool-modal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status == 401) {
                    window.location.href = '/login';
                } else {
                    console.error('Error fetching data:', error);
                }
            }
        });
    });

});