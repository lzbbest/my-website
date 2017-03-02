<?php
session_start();
header('Content_type:image/png');//���嵱ǰҳ�������
$TestCodeChars="1234567890";//��֤���ַ���
$TestCodeLen=4;//��֤�볤��
$TestCode="";//��֤���ַ�����ʱ�洢����


for($i=0;$i<$TestCodeLen;$i++){
	srand();
	$TestCode.=$TestCodeChars[rand(0,strlen($TestCodeChars)-1)];
}
//�ж���֤���sessionȫ�ֱ����Ƿ���������������������ǰ�������֤��sessionȫ�ֱ���
if(isset($_SESSION['TestCode'])){unset($_SESSION['TestCode']);}
$_SESSION['TestCode']=$TestCode;//������֤���sessionȫ�ֱ���
$font = "C:\Windows\Fonts\ALGER.TTF";
$FontSize=14;
$angle=10;
$AddSize=6;

$x_size=$TestCodeLen*$FontSize+$AddSize;//ͼ����
$y_size=$FontSize+$AddSize;//ͼ��߶�

$im = @imagecreatetruecolor($x_size,$y_size);//���廭��
$white=imagecolorallocate($im,255,255,255);//����������ɫ
$red = imagecolorallocate($im,255,0,0);//����ǰ���ú�ɫ
imagefilledrectangle($im,0,0,$x_size-1,$y_size-1,$white);

for($i=0;$i<$TestCodeLen;$i++){//�ڻ������ú�ɫ�����ն���õ����������֤���ַ�
	imagettftext($im,$FontSize,$angle,$FontSize*$i+$AddSize,$FontSize+$AddSize/2,$red,$font,$TestCode[$i]);
}

for($j=0;$j<50;$j++){//�������û�������ĺ�ɫ��
	imagesetpixel($im,rand(0,$x_size),rand(0,$y_size),$red);
}
imagepng($im);//��png��ʽ����ڴ���ͼ��
imagedestroy($im);//ɾ���ڴ���ͼ�����ݼ�
?>