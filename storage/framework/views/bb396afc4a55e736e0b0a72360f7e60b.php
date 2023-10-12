<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="antialiased">
        <div class="relative">
            <?php if(Route::has('login')): ?>
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="card">
  <div class="card-header">
     User Details Page
  </div>
  <div class="card-body">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">User Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone Number </th>
      <th scope ="col">Profile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
     
        <td><?php echo e($user->id); ?></td>
        <td><?php echo e($user->name); ?></td>
        <td><?php if($user->gender == 0): ?>
                Male
            <?php else: ?>
                Female
            <?php endif; ?>
        </td>
        <td><?php echo e($user->phone_number); ?></td>
        <!-- <?php echo e($user->image); ?> -->
       
        <td>
            <img src="<?php echo e(asset('images/'.$user->image)); ?>" alt="profile picture" width="100px" height="100px"></td>
        <td >
        <form action="<?php echo e(route('users.delete', $user->id)); ?>"  method="POST">
            <a href="<?php echo e(route('users.show',$user->id)); ?>" class="btn btn-success">Show</a>
            <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-primary">
            Edit
             </a>
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
            <button class="btn btn-danger">Delete</button>
            </form>
            
</td>    
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
  </tbody>
</table>
  </div>
</div>
       
        </div>
        
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\RegisterForm\resources\views/welcome.blade.php ENDPATH**/ ?>