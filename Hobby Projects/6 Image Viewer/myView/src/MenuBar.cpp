#include "MenuBar.h"

MenuBar::MenuBar(int nx, int ny, int nw, int nh) {
	x = nx;
	y = ny;
	width = nw;
	height = nh;

	initButtons();
	positionButtons();
}

MenuBar::~MenuBar() {
	for (unsigned int i = 0; i < buttons.size(); i++) {
		delete buttons[i];
		buttons[i] = nullptr;
	}
}


void MenuBar::show(sf::RenderWindow &window) {
	for (ImageButton *b : buttons)
		b->show(window);
}

void MenuBar::onWindowResize(int nw) {
	width = nw;
	positionButtons();
}

void MenuBar::onHover(int mx, int my) {
	for (ImageButton *b : buttons) {
		b->onHover(mx, my);
	}
}

void MenuBar::onClick(int mx, int my, Image *image) {
	for (ImageButton *b : buttons)
		b->onClick(mx, my, image);
}


void MenuBar::initButtons() {
	buttons.push_back(new ImageButton(Shared::workingDir + "material-design-icons/open.png"));
	buttons.push_back(new ImageButton(Shared::workingDir + "material-design-icons/rotate_left.png"));
	buttons.push_back(new ImageButton(Shared::workingDir + "material-design-icons/rotate_right.png"));
	buttons.push_back(new ImageButton(Shared::workingDir + "material-design-icons/zoom_in.png"));
	buttons.push_back(new ImageButton(Shared::workingDir + "material-design-icons/zoom_out.png"));

	buttons[0]->bind(&Image::openImage);
	buttons[1]->bind(&Image::rotateLeft);
	buttons[2]->bind(&Image::rotateRight);
	buttons[3]->bind(&Image::zoomIn);
	buttons[4]->bind(&Image::zoomOut);
}


void MenuBar::positionButtons() {
	float nx = (width - buttons.size() * buttons[0]->getWidth()) / 2;
	
	for (uint32_t i = 0; i < buttons.size(); i++) {
		buttons[i]->setPos(nx + i * buttons[i]->getWidth(), y);
	}
}

