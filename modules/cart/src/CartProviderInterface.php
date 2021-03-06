<?php

/**
 * @file
 * Contains \Drupal\commerce_cart\CartProviderInterface.
 */

namespace Drupal\commerce_cart;

use Drupal\commerce_store\StoreInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Creates and loads carts for anonymous and authenticated users.
 *
 * @see \Drupal\commerce_cart\CartSessionInterface
 */
interface CartProviderInterface {

  /**
   * Creates a cart order for the given store and user.
   *
   * @param string $orderType
   *   The order type id.
   * @param \Drupal\commerce_store\StoreInterface $store
   *   The store.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user. If empty, the current user is assumed.
   *
   * @return \Drupal\commerce_order\OrderInterface
   *   The created cart order.
   *
   * @throws \Drupal\commerce_cart\Exception\DuplicateCartException
   *   When a cart with the given criteria already exists.
   */
  public function createCart($orderType, StoreInterface $store, AccountInterface $account = NULL);

  /**
   * Gets the cart order for the given store and user.
   *
   * @param string $orderType
   *   The order type id.
   * @param \Drupal\commerce_store\StoreInterface $store
   *   The store.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user. If empty, the current user is assumed.
   *
   * @return \Drupal\commerce_order\OrderInterface|null
   *   The cart order, or NULL if none found.
   */
  public function getCart($orderType, StoreInterface $store, AccountInterface $account = NULL);

  /**
   * Gets the cart order id for the given store and user.
   *
   * @param string $orderType
   *   The order type id.
   * @param \Drupal\commerce_store\StoreInterface $store
   *   The store.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user. If empty, the current user is assumed.
   *
   * @return int|null
   *   The cart order id, or NULL if none found.
   */
  public function getCartId($orderType, StoreInterface $store, AccountInterface $account = NULL);

  /**
   * Gets all cart orders for the given user.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user. If empty, the current user is assumed.
   *
   * @return \Drupal\commerce_order\OrderInterface[]
   *   A list of cart orders.
   */
  public function getCarts(AccountInterface $account = NULL);

  /**
   * Gets all cart order ids for the given user.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user. If empty, the current user is assumed.
   *
   * @return int[]
   *   A list of cart orders ids.
   */
  public function getCartIds(AccountInterface $account = NULL);

}
