<?php

include "connect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css">
    <title>Hitung Nilai Mahasiswa</title>
</head>
<body class="bg-gradient-to-tr from-blue-400 to-slate-300">
    <div class="h-screen flex justify-center items-center">
        <div class="w-full mx-auto px-12 md:px-24">
            <div class="grid md:grid-cols-6">
                <div class="bg-slate-50 px-4 py-2 rounded-t-md md:rounded-tr-none md:rounded-l-md md:col-span-2">
                    <h1 class="font-sans font-bold text-xl mb-4 mt-4">Hitung Nilai Mahasiswa</h1>
                    <form action="add.php" method="post" id="formNilai">
                        <label for="" class="block mb-2 font-semibold">Nama Mahasiswa :</label>
                            <div class="relative mb-4">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                        </svg>
                                    </div>
                                <input type="text" name="nama" id="nama" class="block border rounded-md w-full h-[2.1rem] pl-10 p-2.5" required>
                            </div>
                        <label for="" class="block mb-2 font-semibold">Mata Kuliah :</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                            <input type="text" name="matkul" id="matkul" class="block border rounded-md w-full h-[2.1rem] pl-10 p-2.5" required>
                        </div>
                        <div class="mb-6">
                            <label for="" class="block mb-2 font-semibold">Grade :</label>
                            <select name="grade" id="grade" class="border rounded-md md:w-52 w-full h-[2.1rem]" required>
                                <option value="">Pilih Grade</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <label for="" class="block mb-2 font-semibold">Nilai:</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                            <input type="number" name="nilai" id="nilai" class="block border rounded-md w-full h-[2.1rem] pl-10 p-2.5" required>
                        </div>
                        <button type="submit" name="submit" class="md:w-52 w-72 mb-6 mt-2 px-4 py-2 rounded-md font-semibold bg-blue-500 text-white hover:bg-blue-400">Hitung</button>
                    </form>
                </div>
                <div class="bg-slate-200 rounded-b-md md:rounded-bl-none md:rounded-r-md md:col-span-4">
                    <h1 class="font-sans font-bold text-xl mt-4 ml-4 mb-4">Result :</h1>
                    <div class="relative overflow-x-auto p-4">
                        <table  id="hasilTable" class="w-full text-sm text-left text-slate-900">
                           <tr class="bg-slate-100 text-lg font-sans font-semibold">
                                <td>Nama</td>
                                <td>Mata Kuliah</td>
                                <td>Grade</td>
                                <td>Nilai Rata-Rata</td>
                                <td>Aksi</td>
                           </tr>
                           <?php
                           $see = "SELECT * FROM nilai";  
                           $result = mysqli_query($db,$see);                         
                           while($user_data = mysqli_fetch_array($result)) {
                           ?>
                           <tr class="bg-slate-100 text-lg font-sans font-semibold my-5">
                               <td class="px-6 py-4"><?php echo $user_data['nama'];?></td>
                               <td class="px-6 py-4"><?php echo $user_data['matkul'];?></td>
                               <td class="px-6 py-4"><?php echo $user_data['grade'];?></td>
                               <td class="px-6 py-4"><?php echo $user_data['nilai'];?></td>
                               <td class="px-6 py-4">
                                    <?php
                                    
                                    echo "<a href='edit-data.php?id=".$user_data['id']."' class='hover:text-blue-400'>Edit </a>";
                                    echo "<a href='delete.php?id=".$user_data['id']."' class='hover:text-red-400'> Delete</a>";
                                    
                                    ?>
                               </td>
                               
                           </tr>
                           <?php
                           }
                           ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>