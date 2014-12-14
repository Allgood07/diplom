1. Install 
    - vagrant https://www.vagrantup.com/downloads.html
    - chef  http://www.getchef.com/chef/install/
    - virtualbox https://www.virtualbox.org/wiki/Downloads
    
    - $ vagrant plugin install vagrant-vbguest
    - $ vagrant plugin install vagrant-omnibus
    - if you want add some recipe with Cheffile , you need install ruby and gem 'librarian-chef' 
    
2. Up app

    - $ cd vagrant && vagrant up
    - cd vagrant && vagrant ssh
    - cd ~/app && ./make
