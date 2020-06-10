#include "MainArea.h"


MainArea::MainArea(float nx, float ny, float nw, float nh) {
	x = nx;
	y = ny;
	width = nw;
	height = nh - ny;

	image = new Image();

	image->setShowArrows(&showArrows);

	leftButton = new ImageButton(Shared::workingDir + "material-design-icons/arrow_left.png");
	leftButton->setSize(ARROW_WIDTH, height);
	leftButton->setPos(x, y);
	leftButton->bind(&Image::imageLeft);

	rightButton = new ImageButton(Shared::workingDir + "material-design-icons/arrow_right.png");
	rightButton->setSize(ARROW_WIDTH, height);
	rightButton->setPos(width - rightButton->getWidth(), y);
	rightButton->bind(&Image::imageRight);
}

MainArea::~MainArea() {
	delete image;
	delete leftButton;
	delete rightButton;

	image = nullptr;
	leftButton = nullptr;
	rightButton = nullptr;
}


void MainArea::setImage(std::string path) {
	image->setImage(path);
	image->setBoundary(x, y, width, height);
}

void MainArea::update(sf::Window &window) {
	image->update(window);
}

void MainArea::show(sf::RenderWindow &window) {
	image->show(window);

	if (showArrows) {
		leftButton->show(window);
		rightButton->show(window);
	}
}

void MainArea::onWindowResize(float nw, float nh) {
	width = nw;
	height = nh - y;
	image->setBoundary(x, y, width, height);

	leftButton->setSize(ARROW_WIDTH, height);
	leftButton->setPos(x, y);

	rightButton->setSize(ARROW_WIDTH, height);
	rightButton->setPos(width - rightButton->getWidth(), y);
}

void MainArea::onClick(int mx, int my) {
	leftButton->onClick(mx, my, image);
	rightButton->onClick(mx, my, image);
}

void MainArea::onPress(int mx, int my) {
	image->onPress(mx, my);
}

void MainArea::onRelease() {
	image->onRelease();
}

