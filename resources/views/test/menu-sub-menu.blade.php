<style>

nav li {
  position: relative;
}


nav > ul {
  display: block;
  width:250px;
}


nav li a {
  display: block;
  padding: 10px 15px;
  background: green;
  border: 3px solid green;
  
  font-size: 1.25em;
  color: #fff;
  text-decoration: none;

  white-space: nowrap;
  transition: all .3s;
  
  &:hover {
    background: #fff;
    color: green;
  }
}


nav ul ul {
  visibility: hidden;
  opacity: 0;
  

  min-width: 150px;
  
 
  position: absolute;
  top: 150%;
  
  transition: all .3s; 

}


nav ul li:hover > ul {
  top: 100%;
  visibility: visible;
  opacity: 1;
  left:98%;
}


nav ul ul ul {
  left: 100%;
}

nav ul ul li:hover > ul {
  top: 0;
  left:99%;
}



nav {
  max-width: 1000px;
  margin: 25px auto;
}


</style>

      <nav>
        <ul>
          <li>
            <a href="#">Link</a>
            <ul>
              <li>
                <a href="#">Link</a>
              </li>
              <li>
                <a href="#">Longer Link</a>
              </li>
              <li>
                <a href="#">Link</a>
                <ul>
                  <li>
                    <a href="#">Link</a>
                  </li>
                  <li>
                    <a href="#">Longer Link</a>
                    <ul>
                      <li>
                        <a href="#">Link</a>
                      </li>
                      <li>
                        <a href="#">Longer Link</a>
                      </li>
                      <li>
                        <a href="#">Link</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Link</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Link</a>
          </li>
          <li>
            <a href="#">Link</a>
          </li>
          <li>
            <a href="#">Link</a>
          </li>
        </ul>
      </nav>