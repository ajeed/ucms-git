@echo.
@echo off

SET app=%0
SET lib=C:\dev\xampp1.7\htdocs\ucms\cake\console\

C:\dev\xampp1.7\php\php.exe -q "%lib%cake.php" -working %CD% %*

echo.