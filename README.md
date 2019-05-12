# ktu-web-proje


KTÜ Bilgisayar Mühendisliği Bölümü
Web Programlama Projesi 


RAPOR


Programcıların Adı Soyadı:Hakan TÜRKMEN,Oğuzhan TORUN,Fatma
Programlama Dilleri:PHP,Javascript,HTML,CSS,SQL

Projenin Açıklaması:

Sitenin 2 tarafı bulunmaktadır. Birincisi kullanıcının girdiği sadece bilgileri görebildiği herhangi bir ekleme veya düzenleme yapamadığı arayüz. İkincisi ise admin paneli dediğimiz hangi bölümden giriş yapılırsa o bölümün arayüzünün düzenlendiği arayüzdür. Birinici arayüzde kullanıcı hangi bölümün etkinliklerini,duyurularını vs. görmek istiyorsa ona göre yönlendirmelere tıklayarak ulaşabilir. İkinci arayüzde ise bölüme giriş yaparak admin istediği duyuruyu ekleyebilir istediği duyuruyu silebilir bu tarz her isteğini yerine getirebilir. Arayüzlerin nasıl çalıştığından kısaca bahsedecek olursak birinci arayüz GET’ten aldığı parametrenin değerine göre veritabanından o değerin verilerini çekerek sayfanın içini dolduruyor. İkinci arayüz ise giriş sayfasından giriş yaptıktan sonra kullanıcı bilgilerini SESSION da saklar. Daha sonra yapılan işlemlere göre bu kullanıcı bilgilerine göre ne yapmak istiyorsak o işlemi veritabanında gerçekleştirir. Veritabanı tasarımı ise duyuru,video,resim,etkinlik,ders,kullanici olmak üzere 6 tablo bulunmakta. Kullanıcı tablosunda her bölümün bir kullanıcısı vardır. Bu kullanıcı tablosunun diğer tablolarda FOREIGN KEY i bulunmaktadır. Bu keyler sayesinde tablolar arasında bağlantı kuruluyor. 



  <img src="https://i.hizliresim.com/Gm6116.png" alt="">












Son olarak birinci arayüzde arka planda javascript çalışıyor. Bu javascript kodları sayesinde admin tarafında eğer herhangi bir ekleme yapılırsa doğrudan sayfaya eklenmektedir. Ayrıca javasciprt sayesinde güncel olarak hava durumu takip edilebilmektedir.
