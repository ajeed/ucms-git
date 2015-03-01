@echo.
@echo off

SET app=%0
SET lib=c:\xampp\htdocs\ucms\cake\console\

c:\xampp\php\php.exe -q "%lib%cake.php" -working %CD% %*

echo.