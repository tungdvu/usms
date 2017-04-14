<?php
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */
?>
<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">Hệ thống</li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Danh mục</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php if(isset($active) && count($active)){echo (in_array("department",$active))?" active":"";}?>">
                  <a class="animsition-link" href="/department">
                    <span class="site-menu-title">Phòng Ban</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/user">
                    <span class="site-menu-title">Người dùng</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Chức danh</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Hội đồng</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Vị trí hội đồng</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Loại thông báo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Trạng thái quy trình</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-settings" aria-hidden="true"></i>
                <span class="site-menu-title">Hệ thống</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý chức năng</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý phân quyền</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Account">
                    <span class="site-menu-title">Quản lý tài khoản</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Account/Group">
                    <span class="site-menu-title">Nhóm tài khoản</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Profile/changepass">
                    <span class="site-menu-title">Đổi mật khẩu</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-category">Quản lý khoa học</li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-palette" aria-hidden="true"></i>
                <span class="site-menu-title">Cấp Nhà nước, Bộ</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Nhập dữ liệu</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Thống kê</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-format-color-fill" aria-hidden="true"></i>
                <span class="site-menu-title">Cấp trường</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý thông báo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Khởi tạo đề xuất</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý đề xuất</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý hội đồng</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý đề cương</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Tình trạng đề tài</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Nhập kết quả bảo vệ</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/ScienceUni/add">
                    <span class="site-menu-title">Nhập dữ liệu KHCN cũ</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/ScienceUni">
                    <span class="site-menu-title">Thống kê đề tài</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-puzzle-piece" aria-hidden="true"></i>
                <span class="site-menu-title">Quản lý tạp chí KHCN</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Thông báo nhận bài báo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Nhập dữ liệu bài báo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý nội dung bài báo</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="/Construction">
                    <span class="site-menu-title construction">Quản lý tạp chí</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="site-menu-category">Quản lý bài báo</li>
            <li class="site-menu-item">
              <a class="animsition-link" href="/Magazine/add">
                <i class="site-menu-icon md-chart" aria-hidden="true"></i>
                <span class="site-menu-title">Nhập dữ liệu</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="/Magazine">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Tổng hợp bài báo</span>
              </a>
            </li>

            <li class="site-menu-category">Báo cáo</li>
            <li class="site-menu-item">
              <a class="animsition-link" href="/Construction">
                <i class="site-menu-icon md-chart" aria-hidden="true"></i>
                <span class="site-menu-title">Tổng hợp đề tài</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="/Construction">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Tổng hợp kinh phí</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="site-menubar-footer">
      <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
      </a>
      <a href="/authentication/logout" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
  </div>