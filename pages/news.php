<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">
                                Latest News
                            </h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <?php
                    $statement = $pdo->prepare("
                    SELECT 
                        page.id, 
                        page.title, 
                        page.description, 
                        page.author, 
                        page.image_path, 
                        page.views, 
                        page.date, 
                        category.name AS category_name,
                        COUNT(comment.id) AS comment_count
                    FROM page
                    INNER JOIN category ON page.category = category.id
                    LEFT JOIN comment ON page.id = comment.page_id
                    GROUP BY page.id, page.title, page.description, page.author, page.image_path, page.views, page.date, category.name
                    ORDER BY page.id DESC
                    LIMIT 2
                ");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $date = $row['date'];
                        $category = $row['category_name'];
                        $description = $row['description'];
                        $author = $row['author'];
                        $image_path = $row['image_path'];
                        $views = $row['views'];
                        $comments = $row['comment_count'];
                        ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="<?php echo $image_path; ?>" style="object-fit: cover"
                                    loading="lazy" />
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">
                                            <?php echo $category; ?>
                                        </a>
                                        <a class="text-body" href=""><small>
                                                <?php echo $date; ?>
                                            </small></a>
                                    </div>
                                    <?php $page_link = "page.php?id=" . $id; ?>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                        href="<?php echo $page_link; ?>">
                                        <?php echo $title; ?>
                                    </a>
                                    <p class="m-0">
                                        <?php echo $description; ?><br />.<br />
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="" />
                                        <small>
                                            <?php echo $author; ?>
                                        </small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>
                                            <?php echo $views; ?>
                                        </small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>
                                            <?php echo $comments; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-12 mb-3">
                        <div class="custom-slider-container">
                            <div class="custom-slider">
                                <img src="img/ads/postArticle.png" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- Ad Section -->
                    <div class="col-lg-12 mb-3">
                        <a href="https://www.burger.com" target="_blank"><img class="img-fluid w-100"
                                src="img/ads/burger1.gif" alt="" style="border-radius: 10px" /></a>
                    </div>
                    <!-- End Ad Section -->

                    <!-- Footer feather -->
                    <div class="col-lg-12">
                        <div class="row news-lg mx-0 mb-3">
                            <div class="col-md-6 h-100 px-0">
                                <img class="img-fluid h-100"
                                    src="https://www.hackread.com/wp-content/uploads/2023/09/agent-tesla-malware-excel-exploit-windows-devices-2-800x467.jpg"
                                    style="object-fit: cover; border-radius: 15px" />
                            </div>
                            <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                <div class="mt-auto p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">Cyber Attack</a>
                                        <a class="text-body" href=""><small>Sep 06, 2023</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                        href="https://www.hackread.com/agent-tesla-variant-excel-exploit-windows-pc/">New
                                        Agent Tesla Variant Uses Excel Exploit to Infect
                                        Windows PCs...</a>
                                    <p class="m-0">
                                        FortiGuard Discovers Phishing Campaign Distributing New
                                        Agent Tesla Variant to Windows Devices.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2"
                                            src="https://secure.gravatar.com/avatar/98fafd721614928c5b20cd78eadc2ff5?s=100&d=mm&r=g"
                                            width="25" height="25" alt="" />
                                        <small>DEEBA AHMED</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer feather -->

                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/jpeg;base64,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"
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Web Design</a>
                                    <a class="text-body" href=""><small>Sep 27, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="./database/blog_files/2023-08-27.html">The Art of Debugging CSS: Common Issues
                                    and Solutions</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="https://www.dotcominfoway.com/wp-content/uploads/2021/01/CMS.png" alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Web Design</a>
                                    <a class="text-body" href=""><small>Sep 28, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="./database/blog_files/2023-08-28.html">Mastering CSS Grid: A Comprehensive
                                    Guide</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7R8NxRd6jZo02-6Q68QcBtNDMtrJLnXT30A&usqp=CAU"
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Web Design</a>
                                    <a class="text-body" href=""><small>Sep 29, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="./database/blog_files/2023-08-29.html">10 Tips to Improve Your CSS Code
                                    Quality</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG4AAABuCAMAAADxhdbJAAAB3VBMVEX///+j3PL99NT63HH51lgspOhgw+j//9P/9dO55PUdd9uv3+7/3Fr/Lm783G3/40b/3GfC5Oj/+M+23NeX3P8AZPaZ2fVCjt9KkN3/7V+csZ6v3fbFwHcAW9wAXu75syP9998Ta9mfwNdDo+Lf8/ps0eouq+rF6fZJsOcMb+X/6ECT+v+/Djp8yv9ajc40h+P/3U7PibP/EVjb6LnB3Mb/JmSMyepZsM8Ps/mutoUEaeb++ekgedv/7jf/uwn93sn4pQAQnPhTvub/+SjHpk0Aaez98ML75ZX82I794Kb65IH653H5/3L++/H86afs0GCrtYfWGU3/krMAV/X/Hm765XEinuiSve385JDU5PLt3Gv/8qlopem9u3/j4rlYkep7oaJVjb6bsYxXk7SZ7v/L+vnQmrv/rshlmK0AUv//0CP/AEn/3gtDteeL8/+xsdX/h6tckLijlmTqrim/x9mIppuKln/+x73OyGr9srb/NXr/f5b+UICgoGFzj5V0qdkAU92/0tWuvnr/z+NSWrsNHavj59WolLwANMGev83//8W909b3mwD8xYT6s0b3cgBss7b9e3D7y278oHD+Vm+Rwq75y039cW/8rnD/94//umed09QrU8bE1PmQue2NASLFAAAHy0lEQVRoge2Yi3fa1hnADcJIiJeiBgEuAomEZ2ekJbFbS7JL7YBTINgtGDsLdDauNztdlrmZM9ftRrolLI2zrnm02Zytf+vulYQEmCQyBp+zc/idY+BKsn583/3uA42NjRgxYsSIESPOgOtYtlgsZrHr+hFz95EBsmJRINZIuW1eI9QjK0Ow3fgVb2mxCNo3tRafvzhwW9VTc+uC4o3PdHmylvn1oHV4IqDr3AHPcrKtJUiD1nFv0iXwQaezWzfToRt6dJ06fDg6B8/zDk2ntRLsUHQ8v7S0xCd5qHODd9jiYangEbvNADHDXQx17npGEAR23ZIEulnLOgtambob6uZNdpMRYifRLW/Ul+ubO97ZfU9tltvZrM/UN5YVnX0rFtuyU/atrTd7DcYHdURyYTY5u7C0LPfdskVuJQmos8Z91aqvYWv4qtM9fJ+/p3GC6GqchOOpwKw87mZrPhyXuBm/rPMKLEv7tnx0YjJ23Bb+ZYvffPpbQzoB6CbwzfVtbmdjNgCSmdrxbq9v4vVbc1dBMikTRVHgzlSPBH5uOvjiUosppxEf1BHuBcjMOiyV5HoNNn43l4a625ScQll4jN/fueRs4w8GdY6l+vbuJkijnMwFd31zd/vLuyGos9pt9tfy3h+n2nWfGtQl93ZYL+7x7M3CgbDu8eBetnRvbu5qRmJQzPwaMEz805TzFy0+OTCqcywFHG5+P5VKyn23sc/fSl+F0WUkM4r1hAR/zIfOKecnGoajs/Buh8PhdjvkZPLgQyg0Fwop0fUKjEQB5q8ufaEl8uDAYDIz+wtJgJuHRlgqDjBnzkFu3X2NjkTDvtQh+vU3Xx84W5k02HdeYXt5b2+vHuiYM69+ee/evT//RZCaPXQY2rgv0MK3KMN8M3XCUvFKmVIpGPQkpNTe0sJ+qbawtJeSEhmPp1TyCGyv6NBmgsUl2gsSeqCMhLJzyuhAYCWO46QEfT/owev7QuCvuCd4n07gHOfl2AbZozDR72gwCbGSmWS+0qObOvibAd2Dh3dAAM3DcIMTgp6UN5UJ0lIjfNiEN+49DNAmDqNLwZMfypj//vCBAReM7tEdVC401Bzm6AyeobkwI7dJkkQxRqPdFxZAcHK3yqfE6+FHnDGdTwir3QMMYVwA+UO1/hJFLKtCMiLTCpVEvQk6jDKiCL8FuOTxdxmfMZ2XDmt3J9Hmt01dxohZhCBcCgSxZhZb0ZESKzQeP84WF9dyOcTl8k8E+9DJEWqfGSZnWcuCoGSwostSFNW+8yVwPLHt8BOE8nX61bXBMC6C6bi0yMs+9DAhSJLEBrmcH1EYgE7MEd3XZvksgzFNVgDjAJek0q7fNSgdk7XA2LLXZD5WLs4honhzgsYVWHYt34+u15QvIjlwVkw/SQOehMbGsOzYGGPJFpN1D6vqhJpfqaNT68yYBdx+DEuHZO7+4/t0CIZHWPwTmVZ0icDJdULj+JbHZLJTlXfBWXNI5Z9PQndB+4O4zXR+UqO1gYk1BMPRrW6d68UPF3vo9n68cuXKZY0rKpfD9AmSSfbCXWxLZkhN5twtwtGDZL3PykRbA11cQ8BZMaSVijkL7Wrl5wsFtShPNRDQ5uqqsqIypAM+GWCufSyjXBwK5eTbF46ePkUKp9ahhyxN44pPXLSIXdc+SyOyrvC8XC47n+VPqSPNEi2BZVpZU8WcPBY0xO+fELIt/wzInOUXhVPq0CYcwCwu7xgwBsSHFMHq0qRANq/9lE671FQ+L8sbBiR/Sh0DXLjAYSRsYWaRXARjmP/xoxAs0J9yObVOjpTo8isn1/noMCNqvlUB6MJtKx4DVoZzphyBIC0ZDO8l1P2rr2QGJ/6dBcu2vDkgUV9CqLZtUMC+wLz4mQlxIe3kEWe5/LK/ygxOJIncYhakThTNaFWgG4qOgXsDLLuI8JfPI0SnrvCiXH7ar86PEBYCyS0Wbz4Og75jD1EUBpstFtfAGZejW5cvPC2DSjkq9FMqUAcAmxHesiuwYJkWNnI5sAdxgS8Bk9itKyAv5Mosv8zn+9YBoX+3hIN1WmJL2264B1Hv1aVbWXGWla2zns9+dP6atpAJAb9+/y6dMuqcHSPvZDp1jaxrusyMegwi6/SmrnOWjwra8uo1qCtNyPs3gvDP6NHV1GMQUJkuh94sPJ/SOCqo/2pYNz1pf0fl1bTGq3fasJtaF/zwCvC+L9Xi/RZxb9SYznaOOt9C/5F/vh3KpLxP3obEKx9ofNSiEo0b0xl45AX0JpONss5bZcZ7MjCdveGbjpmoedU2f8wU5aTowHT2Bov/pxFRZT11Ej646OxenHuIR6wax2xRzrjurbat6qOHjy606aKVLl2F5Qwn880ym4mKRHwP2m3WeEW1gF+w4+Nw0sMr0YrRgfD6uMApCvSVNRJpt1lvt3Qcx42Pc/A1Ol4xGF3P8OTSp6Br3nocvdOi8gt4q1SMPo2+eNxGQRNQ9XLp4XX0n82gDQrbiXUwHdeZ1o6+243RB99vRbdNDuqWb0IflidIV9/oHWs3naXOZrIOrIPergO2+TPQxdREwvXgDDovJo95Zak7g86zwVlTnVuo4euUmUyZTCJDt13smDWHr4u0M0zTf6dXV3++EL+gE2/8DA7dGI6uKskP2ToAR7jqcHQjRowYMWLE/y//AxMQ3xbVuhUxAAAAAElFTkSuQmCC"
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Web Design</a>
                                    <a class="text-body" href=""><small>Aug 02, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="./database/blog_files/2023-09-02.html">CSS-in-JS vs. Traditional CSS: Pros and
                                    Cons</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Social Follow Start -->
                <?php
                $statement = $pdo->prepare("SELECT name, link From social");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    $name = $row['name'];
                    $link = $row['link'];

                    $rowData = array(
                        'name' => $name,
                        'link' => $link
                    );
                    $social_links[] = $rowData;
                }
                ?>
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <br />
                        <a href="<?php echo $social_links[0]['link'] ?>"
                            class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"
                            style="background: #52aaf4">
                            <i class="fab fa-twitter text-center py-4 mr-3"
                                style="width: 65px; background: rgba(0, 0, 0, 0.2)"></i>
                            <span class="font-weight-medium">
                                <?php echo $social_links[0]['name'] ?>
                            </span>
                        </a>
                        <a href="<?php echo $social_links[2]['link'] ?>"
                            class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"
                            style="background: #0185ae">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3"
                                style="width: 65px; background: rgba(0, 0, 0, 0.2)"></i>
                            <span class="font-weight-medium">
                                <?php echo $social_links[2]['name'] ?>
                            </span>
                        </a>
                        <a href="<?php echo $social_links[5]['link'] ?>"
                            class="d-block w-100 text-white text-decoration-none mb-3" target="_blank"
                            style="background: #dc472e">
                            <i class="fab fa-youtube text-center py-4 mr-3"
                                style="width: 65px; background: rgba(0, 0, 0, 0.2)"></i>
                            <span class="font-weight-medium">
                                <?php echo $social_links[5]['name'] ?>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">
                            Advertisement
                        </h4>
                    </div>
                    <div class="slider-container">
                        <div class="slider">
                            <img class="img-fluid" src="img/ads/Place (1).png" alt="Image 1" />
                            <img class="img-fluid"
                                src="https://streetmediagroup.com/wp-content/uploads/2019/02/Slider-StateFarm-2-800x500.jpg"
                                alt="Image 2" />
                            <img class="img-fluid"
                                src="https://abovealladvertising.net/wp/wp-content/uploads/2022/02/Benefits-of-Banner-Advertising-That-Make-It-Crucial-For-Every-Business.jpg"
                                alt="Image 3" />
                            <!-- Add more images here -->
                        </div>
                    </div>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">
                            Tranding News
                        </h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/jpeg;base64,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"
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Tech</a>
                                    <a class="text-body" href=""><small>Sep 7, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="https://www.theverge.com/23861994/polaroid-i-2-instant-camera-test-hands-on-full-frame-becca-farsace">Can
                                    a $599 camera bring Polaroid back?</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG4AAABuCAMAAADxhdbJAAAAilBMVEUAAADiIxrfIxoEAQDxJRzkIxruJRvnJBvqJBv0JhzbIhkaBAPTIRiuGxTMIBdhDwtxEg1rEQy1HBVJCwgSAwIpBgUMAgGUFxF8Ew4+CgcjBQQ1CAYeBANYDgpdDguiGRMvBwVRDQm9HRZCCwijGROBFA/DHheMFhB/FA+JFRAqBwX8Jx1HCwkyCAWmDjWLAAAEFUlEQVRoge2Z2ZqiSBCFk9xBQFTEXdR2rKWr3//1JoWqchkND5jWRY9x4VV+/GRsxAkZe9rTnva0v9iE+IuR5Xg5/zlkh4cySsaDvEY+FibYQEZcaanj5J9J59FIwd4kDwLOa2S/N3wsskhtUNseaaWJyu7qcY7NIxUcjPNA6VBFSXdWPAAp2Frz4NQqpDTpaD2sz/hDClbKc9wn0kjNN9uF3xopdvYSrkYqq3WweVnPhS/k0FyBfWVPYKXkm5fBlN2PFKx70ZdnSJewMkheF/mdSMFGN3HfyFDGSfYrr4ntkHlMOvMMaWxoHfKjZY0INvtPGdy8pWs+6Wg5adEJBFs2w33dUmodj3rDhgmLhu4yUppduc6LBtcrUjh0F5CBK8sofRt0sPsJ9qu5L88uqdwt43SK4RbtfHnGVPodwonyvtt9mtlhATz9+LQ1LsdIQQg2sbcfBuDCJYbLQh++DBQUOsYSH6Hjuo8VQoOGSeHkG+ZLH2Wwxw0w3NhL6FTUgXzJtl5CZzdY6ApPocswXw68tBSuZxjuxUumKA71ZyY2V0e+Bsb1FqI5oeWlYYZg6NaUL43Zfz4RszPIlbXQukZLYxtqw28jVTCHfFkQoXPJnU96yR6paCTXCVZ1neB66PbJ7SyfZVvu5jwKF/bA0BFVt0/uz3luOslKqhvYCTZrEh3skNzVk6icMjE4+FGhO05uN9Bcx7kXw6baKVV19s/RyYN4v/Fi122/3qBCd5zcK7IbDJG7kdP6SXI7BUh8FU2K0JwR0/pZchOz6P7FoNB1qAnzJLmpk1wusNCRHorF0UNI8W7A0FHJbfuHPRX5YtzuwLmBFFrmezUmbuUURGMrekox1WpsuSpoGcFl9/7QVQ+qV2NpuVhTMsJgcwOV3MdIJxX59e7jQoc1TLIMTpHEQS5H2Nfg3ceA6doBWHU9P9M61jBZ2/XGqcFV50sjQ6FzGtnPtC5BjTz2M61HOeJKIfxoZNtHaN5CF75ivrxzM/WFQxumr9BBGll4W28gNMbmnkIHbqY8rTc0uN7IdOQBpzhUdW5a/60UKBWpy4FCi03KmDupiKrTKzisDCrL58tRbOUtqUjjPlBcdSz/U0lF2RKpYjB0NbFCzp1UjGWbW3JZNv2TpD6eD7oJ16FthuQS0sgXL8k6g3E/aoQEN1PXkfOP134kpQ0gpIqw9QZ9y+UoUaG+jeS6vIN2jBwuRjslKySBw9YbGFJMu8nOSKoTnIh3D0i2WiZpEGp1EWnSJlV3G1n9FqtsG9vQBudIeKnYGLlfjQXmbDXWpGE2R05nmesE8lCWioO79RbE79XY5qssObyZasusfjvrt74KpeUaFFr3EGvAe/d1E/1ePxx3hJxmoEb2h/xJ+3ni0572tP+1/QswqztKQHpCrAAAAABJRU5ErkJggg=="
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Gaming</a>
                                    <a class="text-body" href=""><small>Sep 05, 2023</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="https://www.bbc.com/news/technology-66755095">Roblox coming to PlayStation 4
                                    and PS5</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid" src="img/news-110x110-3.jpg" alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Business</a>
                                    <a class="text-body" href=""><small>2 Days Ago</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="https://www.bbc.com/news/business-66747694">Another FTX executive Ryan Salame
                                    pleads guilty</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/jpeg;base64,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"
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Tech</a>
                                    <a class="text-body" href=""><small>1 Day Ago</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="https://www.bbc.com/news/technology-66717589">TikTok opens Dublin data centre
                                    to ease China spying
                                    fears</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                            <img class="img-fluid"
                                src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxEHBg8IBxERFA8PFRYTFxITCw8OEA4PIBMWIiAdFxMkKDQgJBsxGx8fLTEhMSk3LjouFys/ODMtNygtLisBCgoKDg0OGhAQGCseICUrLS0tNS0yLS0rLS0tLSsrLSs1LS0rKzctLi0rLS0tLS0rLS0tLS0tLS0vLS0tLSstLf/AABEIAG4AbgMBEQACEQEDEQH/xAAbAAEAAgIDAAAAAAAAAAAAAAAAAwYBBQIEB//EACwQAAIBAwMCBAUFAAAAAAAAAAABAgMEEQUhMRJRBkFhsRRxgZGhIiMyUtH/xAAbAQEAAgMBAQAAAAAAAAAAAAAAAgUBAwQGB//EACARAQACAgMBAQEBAQAAAAAAAAABAgMRBBIhMTJBE1H/2gAMAwEAAhEDEQA/AK+edmH0rWgfT9Mrd4Q3aPGO2vHJUpShKaTxHGXjZZeFkjXrv6jvH/1wJJgAAAAAAAAABNd0HbXMqMuYya+z5IYrd4a8N+8bQko8lOv1mCzJJvHr29djMxb4jb7pbr3Vbav4fcFFzl1QjJ7U5uSi8SeM548yqx4M3++9+KenHyf7qi93t75LVdQwADIAAAAAAABb/Fmg1bjVPiLKm5KaWcY2ktu/ZIqOBza0prJKm4PMpjpq8tBcaLcW0HOvScYrluUUl+Sxpycd/wAz9d9OVS/4lrzc6TywBYvDehx1SjUVxKK4cWpxlUi098x/q0/P0OHl8q2K0REK3mcm+K/WrUarbK0v50IpqMXhdTy5Lv8AXnY6sN5tXcuzBbtTtLqGxvAAAAAAAAPXNSu/gLGdzvLoWcLlnjsGOcuTrP8AXkcWKMuTrLzTV9aq6rU6q7xBcRT2j/r9T1HH4tMUfHo8HEri+Q1x0usAntrqVr1ui8dcXB9+l4z7EZpW/wBa74qX9shlJy/k2/m84RiIiPjNK68hgmmAAAAAAAAXfSfE8L+3dlqeFKSceriM8rG/Z/gpMvAnHeL0+KPPwZxX70+KbdUXb3E6M+Yya+eHjJcY53Ta3x33SJRE+u20HsMbmW/8OaGtTjOcpxwoyXTl9UZtYTaxxnfK7HFzOXbDaIhX8zl2x21DU39qrO5lQU1Jx2binhSXK3W51Y7d6dnXgyTeu5dYm3AAAAAAAAAxEb8Y1vxltyeZb/UlGp8r9Y8/NRLLwvcfmD5Dt1dNq0beVatFxjFpfqi023xjvsuTVTkVm2mjHya9tONtf1LSlKnbScepptxeJPGcLPbcXxVyTuyWTBXJPaUNeq7is6tTmW72xl+bJRTr5CdaRrUIyTYAAAAAAAAAAGY46v1cfnBj+6R/ulmuPEyraN8JThFODjFKX7nVDpe+65TS+5wY+DrN3VdODMZ+0qy3l5LBasBkAAAAAAAAAAAAxPvpPvoZ3LExsDIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAf/9k="
                                alt="" />
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="">Business</a>
                                    <a class="text-body" href=""><small>22h Ago</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Apple shares
                                    slide after China government iPhone ban
                                    reports</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Popular News End -->

                <!-- Newsletter Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                    </div>
                    <form id="newsletterForm" action="newsletter.php" method="post">
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>
                                Aliqu justo et labore at eirmod justo sea erat diam dolor diam
                                vero kasd
                            </p>
                            <div class="input-group mb-2" style="width: 100%">
                                <input type="email" class="form-control form-control-lg" placeholder="Your Email"
                                    name="newsletter_mail" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3" type="submit">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                            <small id="defaultMessage">Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </form>
                </div>
                <!-- Newsletter End -->

                <!-- Tags Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex flex-wrap m-n1">
                            <?php
                            $statement = $pdo->prepare("SELECT * FROM category");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $id = $row['id'];
                                $name = $row['name'];
                                ?>
                                <?php $cat_link = "category.php?cat_id=" . $id; ?>
                                <a href="<?php echo $cat_link; ?>" class="btn btn-sm btn-outline-secondary m-1">
                                    <?php echo $name; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->